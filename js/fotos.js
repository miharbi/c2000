function readGet() {
    var _GET = [];
    var uriStr = window.location.href.replace(/&amp;/g, '&');
    var paraArr, paraSplit;
    if (uriStr.indexOf('?') > -1) {
        uriArr = uriStr.split('?');
        paraStr = uriArr[1];
    } else {
        return _GET;
    }
    if (paraStr.indexOf('&') > -1) {
        paraArr = paraStr.split('&');
    } else {
        paraArr = [paraStr];
    }
    for (var i = 0; i < paraArr.length; i++) {
        paraArr[i] = paraArr[i].indexOf('=') > -1 ? paraArr[i] : paraArr[i] + '=';
        paraSplit = paraArr[i].split('=');
        _GET[paraSplit[0]] = decodeURI(paraSplit[1].replace(/\+/g, ' '));
    }
    return _GET;
}
var _GET = readGet();

//requestVars end

function resize(which, max) {
    // not used anymore! was scaling photos after they were loaded. using browser-native inline scaling instead,
    // until google fixes their image size request to work with any imgmax, rather than just 800 :-(
    var elem = document.getElementById(which);
    if (elem === undefined || elem === null) return false;
    if (max === undefined) max = 720;
    if (elem.width > elem.height) {
        if (elem.width > max) elem.width = max;
    } else {
        if (elem.height > max) elem.height = max;
    }
}

//$Update: May 10, 2007$

function imprime_(a) {
    document.write(a);
}
var photosize;
if (!photosize) {
    photosize = 720;
}

var columns;
if (!columns || isNaN(columns) || columns < 1) {
    columns = 5;
}


//Global variables
var photolist = []; //this is used globally to store the entire list of photos in a given album, rather than pass the list around in a URL (which was getting rediculously long as a result)
var album_name = "Galeria de fotos :: Cumbres2000.com"; //this is used globally to store the album name, so we don't have to pass it around in the URL anymore either.
var my_numpics = ""; //this is used globally to store the number of items in a particular album, so we don't have to pass it around in the URL anymore either.
var prev = ""; //used in the navigation arrows when viewing a single item
var next = ""; //used in the navigation arrows when viewing a single item
var titulo = "Inicio de Galer&#237;a";


function picasaweb(j) { //returns the list of all albums for the user
    imprime_('<div class="row" >');
    imprime_("<h3>" + titulo + "</h3>");
    for (i = 0; i < j.feed.entry.length; i++) {
        var img_base = j.feed.entry[i].media$group.media$content[0].url;
        var id_begin = j.feed.entry[i].id.$t.indexOf('albumid/') + 8;
        var id_end = j.feed.entry[i].id.$t.indexOf('?');
        var id_base = j.feed.entry[i].id.$t.slice(id_begin, id_end);
        imprime_('<div class="col-xs-6 col-sm-4 col-md-3">');
        imprime_("<a href='?id=" + _GET.id + "&albumid=" + id_base + "'><img src='" + img_base + "?imgmax=350&crop=1'  class='thumbnail img-responsive'  /></a>");
        imprime_("<h5><a href='?id=" + _GET.id + "&albumid=" + id_base + "'>" + j.feed.entry[i].title.$t + " </a></h5>");
        imprime_('</div>');
    }
    imprime_('</div>');
}

function getphotolist(j) {


    my_numpics = j.feed.openSearch$totalResults.$t;

    // Also get the name of the album, so we don't have to pass that around either.  Added 7/18/2007.
    album_name = j.feed.title.$t;

    for (i = 0; i < j.feed.entry.length; i++) {
        // get the list of all photos referenced in the album and display;
        // also stored in an array (photoids) for navigation in the photo view (passed via the URL)
        var id_begin = j.feed.entry[i].id.$t.indexOf('photoid/') + 8;
        var id_end = j.feed.entry[i].id.$t.indexOf('?');
        var id_base = j.feed.entry[i].id.$t.slice(id_begin, id_end);
        photolist[i] = id_base;

        // now get previous and next photos relative to the photo we're currently viewing
        if (i > 0) {
            var prev_begin = j.feed.entry[i - 1].id.$t.indexOf('photoid/') + 8;
            var prev_end = j.feed.entry[i - 1].id.$t.indexOf('?');
            prev = j.feed.entry[i - 1].id.$t.slice(id_begin, id_end);
        }
        if (i < j.feed.entry.length - 1) {
            var next_begin = j.feed.entry[i + 1].id.$t.indexOf('photoid/') + 8;
            var next_end = j.feed.entry[i + 1].id.$t.indexOf('?');
            next = j.feed.entry[i + 1].id.$t.slice(id_begin, id_end);
        }

    }
}


function albums(j) { //returns all photos in a specific album

    //get the number of photos in the album
    var np = j.feed.openSearch$totalResults.$t;
    var item_plural = "s";
    if (np == "1") {
        item_plural = "";
    }

    var album_begin = j.feed.entry[0].summary.$t.indexOf('href="') + 6;
    var album_end = j.feed.entry[0].summary.$t.indexOf('/photo#');
    var album_link = j.feed.entry[0].summary.$t.slice(album_begin, album_end);
    var photoids = [];

    imprime_("<div class='row'>");
    imprime_("<h3><a href='" + window.location.protocol + "//" + window.location.hostname + window.location.pathname + "?id=" + _GET.id + "'>" + titulo + "</a>  / " + j.feed.title.$t + " [" + np + " Foto" + item_plural + "]</h3>");
    
    for (i = 0; i < j.feed.entry.length; i++) {


        var img_base = j.feed.entry[i].media$group.media$content[0].url;

        var id_begin = j.feed.entry[i].id.$t.indexOf('photoid/') + 8;
        var id_end = j.feed.entry[i].id.$t.indexOf('?');
        var id_base = j.feed.entry[i].id.$t.slice(id_begin, id_end);
        photoids[i] = id_base;


        // display the thumbnail (in a table) and make the link to the photo page, including the gallery name so it can be displayed.
        // (apparently the gallery name isn't in the photo feed from the Picasa API, so we need to pass it as an argument in the URL) - removed the gallery name 7/18/2007
        var link_url = "?albumid=" + _GET.albumid + "&photoid=" + id_base + "&id=" + _GET.id; //+"&photoids="+photoids;
        // disable the navigation entirely for really long URLs so we don't hit against the URL length limit.
        // note: this is probably not necessary now that we're no longer passing the photoarray inside the URL. 7/17/2007
        // Not a bad idea to leave it in, though, in case something goes seriously wrong and we need to revert to that method.
        if (link_url.length > 2048) {
            link_url = link_url.slice(0, link_url.indexOf('&photoids=') + 10) + id_base;
        }
        imprime_('<div class="col-xs-6 col-sm-4 col-md-3">');
        imprime_("<a href='" + link_url + "' rel='lightbox-" + _GET.albumid + "' ><img src='" + img_base + "?imgmax=350&crop=1' class='thumbnail img-responsive' /></a>");
        imprime_('</div>');

    }
    imprime_("</div>");

}



function photo(j) { //returns exactly one photo


    var album_begin = j.entry.summary.$t.indexOf('href="') + 6;
    var album_end = j.entry.summary.$t.indexOf('/photo#');
    var album_link = j.entry.summary.$t.slice(album_begin, album_end);

    var img_title = j.entry.title.$t;

    //get the dimensions of the photo we're grabbing; if it's smaller than our max width, there's no need to scale it up.
    var img_width = j.entry.media$group.media$content[0].width;
    var img_height = j.entry.media$group.media$content[0].height;


    var img_base = j.entry.media$group.media$content[0].url;


    // is this a video? If so, we will display that in the breadcrumbs below.
    var is_video = 0;
    if (j.entry.media$group.media$content.length > 1) {
        //imprime_('This is a '+j.entry.media$group.media$content[1].medium+'.<br>');
        if (j.entry.media$group.media$content[1].medium == "video") {
            // is_video = 1;
        }
    }


    var photo_begin = j.entry.summary.$t.indexOf('href="') + 6;
    var photo_end = j.entry.summary.$t.indexOf('"><img');
    var photo_link = j.entry.summary.$t.slice(photo_begin, photo_end);
    var photo_id = _GET.photoid;



    var album_id = _GET.albumid;
    var my_next = next;
    var my_prev = prev;
    var photo_array = photolist;

    var my_galleryname = album_name;
    var my_fixed_galleryname = album_name;
    var album_base_path = window.location.protocol + "//" + window.location.hostname + window.location.pathname + "?albumid=" + _GET.albumid + "&id=" + _GET.id;

    // Get the filename for display in the breadcrumbs
    var LastSlash = 0;
    var img_filename = img_title;
    for (i = 0; i < img_base.length - 1; i++) {
        if (img_base.charAt(i) == "/") {
            LastSlash = i;
        }
    }
    if (LastSlash !== 0) {
        img_filename = img_base.slice(LastSlash + 1, img_base.length);
    }
    // replace some commonly-used URL characters like %20
    img_filename = img_filename.replace("%20", " ");
    img_filename = img_filename.replace("%22", "\"");
    img_filename = img_filename.replace("%27", "\'");


    for (i = 0; i < photo_array.length; i++) {
        if (photo_array[i] == photo_id) {
            p1 = photo_array[i - 1]; //ID of the picture one behind this one; if null, we're at the beginning of the album
            current_index = i + 1; //this is the count of the current photo
            n1 = photo_array[i + 1]; //ID of the picture one ahead of this one; if null, we're at the end of the album
        }
    }

    prev = album_base_path + "&photoid=" + p1; //+"&photoids="+photo_array;
    next = album_base_path + "&photoid=" + n1; //+"&photoids="+photo_array;


    //Display the breadcrumbs
    var my_item_plural = "";
    if (my_numpics != 1) {
        my_item_plural = "s";
    }
    var item_label = "foto";
    var item_label_caps = "Foto";

    //if (photo_array.length == 1) { var current_index_text = "Total of " + my_numpics + " " + item_label + my_item_plural; } else { var current_index_text = item_label_caps + " " + current_index + " of " + my_numpics; }
    var current_index_text = item_label_caps + " " + current_index + " de " + my_numpics;
    if (is_video == 1) {
        current_index_text = current_index_text + "&nbsp;&nbsp;[VIDEO]";
    } //show in the breadcrumbs that the item is a video
    imprime_("<h3 class = 'pull-left' ><a href='" + window.location.protocol + "//" + window.location.hostname + window.location.pathname + "?id=" + _GET.id + "'>" + titulo + " </a> / ");
    imprime_("<a  href='" + album_base_path + "'>" + my_fixed_galleryname + "</a> / " + current_index_text + "</h3>");


    if (p1 === null) //we're at the first picture in the album; going back takes us to the album index
    {
        prev = album_base_path;
    }

    if (n1 === null) //we're at the last picture in the album; going forward takes us to the album index
    {
        next = album_base_path;
    }

    //the navigation panel: back, home, and next.
    imprime_('<nav><ul class="pagination pull-right">');
    if (photo_array.length > 1) {
        imprime_("<li><a  href='" + prev + "' >&laquo;</a></li>");
    }
    imprime_("<li><a  href='" + album_base_path + "'>Inicio</a></li>");
    if (photo_array.length > 1) {
        imprime_("<li><a  href='" + next + "' >&raquo;</a></li>");
    }
    imprime_("</ul></nav>");

    var max_width = 720; //max width for our photos
    var display_width = max_width;
    if (img_width < display_width) {
        display_width = img_width;
    } //don't scale up photos that are narrower than our max width; disable this to set all photos to max width

    //at long last, display the image and its description. photos larger than max_width are scaled down; smaller ones are left alone
    imprime_("<img id='picture'  src='" + img_base + "?imgmax=" + photosize + "' class='thumbnail img-responsive'  />");
    imprime_("<h4>" + j.entry.media$group.media$description.$t + "</h4> <hr>");


    //now we will trap left and right arrow keys so we can scroll through the photos with a single keypress ;-) JMB 7/5/2007
    imprime_('<script language="Javascript"> function testKeyCode( evt, intKeyCode ) { if ( window.createPopup ) return evt.keyCode == intKeyCode; else return evt.which == intKeyCode; } document.onkeydown = function ( evt ) { if ( evt == null ) evt = event; if ( testKeyCode( evt, 37 ) ) { window.location = "' + prev + '"; return false; } if ( testKeyCode( evt, 39 ) ) { window.location = "' + next + '"; return false; } } </script>');

}

if (_GET.photoid && _GET.albumid) {

    imprime_('<script type="text/javascript" src="http://picasaweb.google.com/data/feed/base/user/' + username + '/albumid/' + _GET.albumid + '?category=photo&alt=json&callback=getphotolist"></script>'); //get the list of photos in the album and put it in the global "photolist" array so we can properly display the navigation arrows; this eliminates the need for really long URLs :-) 7/16/2007
    imprime_('<script type="text/javascript" src="http://picasaweb.google.com/data/entry/base/user/' + username + '/albumid/' + _GET.albumid + '/photoid/' + _GET.photoid + '?alt=json&callback=photo"></script>'); //photo

} else if (_GET.albumid && !_GET.photoid) {
    imprime_('<script type="text/javascript" src="http://picasaweb.google.com/data/feed/base/user/' + username + '/albumid/' + _GET.albumid + '?category=photo&alt=json&callback=albums"></script>'); //albums
} else {
    imprime_('<script type="text/javascript" src="http://picasaweb.google.com/data/feed/base/user/' + username + '?category=album&alt=json&callback=picasaweb&access=public"></script>'); //picasaweb
}
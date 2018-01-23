/**
 * Uses jQuery to automatically add the thickbox to any gallery images.
 */

;jQuery(function($){
    // Iterate through each WordPress "gallery" and, for
    // each anchor tag inside a gallery item, add the thickbox class,
    // and add the "rel" attribute tagged with the gallery's ID.

    //$(".gallery a").addClass("thickbox");

    $(".gallery").each(function(){
        var $gallery = $(this),
            id = $gallery.attr("id");

        $("a", $gallery).attr("rel", id).addClass("thickbox");
    });
});
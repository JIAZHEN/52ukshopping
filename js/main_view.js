$(document).ready(function() {
    $(".thumbailtbs ul li img").click(function() {
        var largePath = $(this).attr("src");
        var idname = $(this).attr("data-id");
        $('#'+idname+' .left-panel img').attr({
            src: largePath
        });
        var desc = $(this).attr("data-desc");
        $('#'+idname+' .right-panel p.description').text(desc);
        var name = $(this).attr("alt");
        $('#'+idname+' .right-panel h4 a').text(name);
    });
});
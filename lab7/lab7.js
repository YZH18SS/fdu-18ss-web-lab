$(document).ready(function () {

 $("#thumbBox img").click(function () {
     // alert("hello");
     function getPath(src) {
         let reg = /[a-zA-Z]+[0-9]+\.jpg$/;
         return "images/medium/" + reg.exec(src).toString();
     }
     var inner = "<em>"+this.alt + "</em><br>"+this.title;
     $('#imgManipulated >img').attr("src",getPath(this.src));
     $("#imgManipulated >figcaption ").html(inner);
 });
    $("input.sliders").on('input',function () {
        var settings = "opacity("+$("#sliderOpacity").val()+"%"+")"
                  +"saturate("+$("#sliderSaturation").val()+"%"+")"
                  + "brightness("+$("#sliderBrightness").val()+"%"+")"
                  +"hue-rotate("+$("#sliderHue").val()+"deg"+")"
                  +"grayscale("+$("#sliderGray").val()+"%"+")"
                  +"blur("+$("#sliderBlur").val()+"px"+")";
        $(this).next().text(this.value);
        $('#imgManipulated >img').css("-webkit-filter",settings)
                  .css("filter",settings);
    });

    $("#resetFilters").click(function () {
        $('#imgManipulated >img').css("-webkit-filter","none")
            .css("filter","none");
        $("#sliderOpacity").val(100)
            .next().text(100);
        $("#sliderSaturation").val(100)
            .next().text(100);
        $("#sliderBrightness").val(100)
            .next().text(100);
        $("#sliderHue").val(0)
            .next().text(0);
        $("#sliderGray").val(0)
            .next().text(0);
        $("#sliderBlur").val(0)
            .next().text(0);

    });
});

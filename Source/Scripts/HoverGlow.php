<script>
    function HoverGlow(selectedElement, targetElement, glowcolor) {
        $('#' + selectedElement).hover(
            function() {
                $('#' + targetElement).addClass('glow-'+glowcolor);
                /*console.log('Hover ' + targetElement);*/
            },
            function() {
                $('#' + targetElement).removeClass('glow-'+glowcolor);
                /*console.log('Unhover ' + targetElement);*/
            });
    }

</script>

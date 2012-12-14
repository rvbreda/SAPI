function makePlaceholders(){
    
    $('textbox').each(
        function () {
            var $this = jQuery(this);
            this.placeholderVal = $this.attr("placeholder");
            console.log(this.placeholderVal);
            $this.val(this.placeholderVal);
        }
    )
    .bind("focus", function(){
        var $this = jQuery(this);
        var val = $.trim($this.val());
        if (val == this.placeholderVal || val == ""){
            $this.val("");
        }
    })
    .bind("blur", function(){
        var $this = jQuery(this);
        var val = $.trim($this.val());
        if (val == this.placeholderVal || val == ""){
            $this.val(this.placeholderVal);
        }
    });
}
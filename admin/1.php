<script>

$(document).on('click','.social',function(e){
    var url  = $(this).data("url");
    if(type=="fb")  var url = 'http://www.facebook.com/sharer.php?u=';
    mini=true&url=';
    window.open(url,'',"width=500,height=500,left=400px,top=100px,location=no");
});

</script>
Try this.

<button class="social" data-url="$add-your-page-url" title="Share on Facebook">
    <i class="fa fa-facebook"></i>
</button>
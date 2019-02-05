<footer>
        <div class="centered">
        	<div class="well">
			<h3><a href="mailto:tor.abaev@mail.ru"><i class="fa fa-envelope"></i> Email: tor.abaev@mail.ru</a>
				<span class="pull-right"> <a target="_blank" href="https://vk.com/tor.abaev"><i class="fa fa-vk"></i> www.vk.com/tor.abaev</a></span>
			</h3>
		</div>
        </div>
</footer>

	</div>

    <script type="text/javascript" src="/public/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    	function sendForm() {
    if(confirm("Вы действительно хотите удалить?")) {
        return true;
    }
     return false;
}

// active button

$(function(){
$('.nav > li > a').each(function() {
    var location = window.location.href;
    var link = this.href;
    if(location  == link){
        $(this).parent().addClass('active');
    }
});

});
    </script>

</body>
</html>
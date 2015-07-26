  <main>
  <script type="text/javascript">
  search_events('body',0);
</script>
	  <div id="register_events">
		  <div id="all">
			<div class="row indigo darken-2" style="width:100%;padding-bottom:0.2em">
			<div class="col s12">
			  <ul class="tabs indigo darken-2">
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="0" onclick="search_events('body',this)">Premium</a></li>
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="1" onclick="search_events('body',this)">Workshops</a></li>
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="2" onclick="search_events('body',this)">Technical</a></li>
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="3" onclick="search_events('body',this)">Management</a></li>
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="4" onclick="search_events('body',this)">Informal</a></li>
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="5" onclick="search_events('body',this)">Combos</a></li>
			  </ul>
			</div>
		  </div>
		 <div class="container row">
			<div class="col s12">
				<div class="input-field col s5">
					<input type='text' id ='search' autocomplete ='off' onkeyup='search_events(this.value,"search")' class='evesearch'><label for="search">Search For Events..</label>
				</div>&nbsp;
				<ul class="collapsible popout col s6" style="float:right" data-collapsible="accordion">
				<li>
					<div class="collapsible-header indigo lighten-5 black-text waves-effect"><i class="material-icons ">library_books</i><i class="material-icons right ">more_vert</i>Registered Events</div>
					<div class="collapsible-body"><?php require("registered_events.php"); ?></div>
				</li>
				</ul>
			</div>
		</div>
		<div id="events" class="container">
		</div>
		<div class=" fixed-action-btn" style="bottom: 30px; right: 24px;">My Cart<br>
			<a class="red btn-floating btn-large waves-effect modal-trigger z-depth-3" title="Event Cart" href="#cart">
				<i class="large material-icons">shopping_cart</i>
			</a>
		</div>
		<div id="cart" class="modal">
		</div>
		</div>
	</div>
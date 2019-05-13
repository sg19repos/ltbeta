$('#searchBtn').click( function(searchTerm) {
    var searchTerm = $('#searchString').val();
    $.ajax({
        url: 'https://itunes.apple.com/search?term='+searchTerm+'&limit=10&country=IN&entity=song&callback=__jp0',
        type: 'GET',
        dataType: 'jsonp',
        // data: $('form#myForm').serialize(),
        success: function(data) {
            // console.log(data)
            data.results.forEach(element => {console.log(element.trackName)})
            // $('.srch-search-results .card-group').html("");
            $('.srch-search-results .container .mainrow').html("");
            data.results.forEach(element =>  {
                    // $('.srch-search-results .card-group').append('<div class="col-4"><div class="card" style="width: 18rem;"><img src='+element.artworkUrl100+' class="card-img-top" alt="..." /><div class="card-body"><h5 class="card-title">'+element.trackName+'</h5><p class="card-text">Cards content.</p><a href="#" class="btn btn-primary" id="makeityours" onClick=saveSong("'+element.trackViewUrl+'")>Make it yours</a></div></div></div>')
                    $('.srch-search-results .container .mainrow').append(`
								<div class="col-sm-12">
									<div class="row">
										<div class="col-4 trackimage">
											<img src=`+element.artworkUrl100+` class="" />
										</div>
										<div class="col-6 trackdetails">
											<div class="row">
												<div class="col-sm-12 trackname">
													<h5>`+element.trackName+`</h5>
												</div>
												<div class="col-sm-12 artistname"><h5>`+element.artistName+`</h5></div>
											</div>
										</div>
										<div class="col-2 shareicon">
											<span class="oi oi-share-boxed" onClick=saveSong("`+element.trackViewUrl+`")></span>
										</div>
									</div>
								</div>
					`)
                    
                })
        }
    });
});

function saveSong(songUrl) {
    $.post("saveSong.php",
    {
        songUrl: songUrl,
        songTime: new Date(),
    },
    function(data,status){
		console.log(data);
        console.log(status);
		// $('.alert').alert();
		if(status=='success'){
			$('.alert').attr('class', 'alert-success');
			$('.alert-success').removeAttr("hidden");
			$('.alert-success').html('Your song was successfully broadcasted..!');
		}
		else{
			$('.alert').attr('class', 'alert-danger');
			$('.alert-danger').removeAttr("hidden");
			$('.alert-danger').html('Seems some issue. Please try again in sometime or contact admin.');
		}
    });
}

function getSongLink(trackId){
    // var songLink = "https://song.link/in/i/"+trackId;
    var songLink = "https://song.link/embed?url="+trackId;

    // console.log(songLink);
    // var src2 = 'https://song.link/embed?url='+$('#songurl').val().trim();
    var frameValue = `<iframe width="460" height="150" src=songLink frameborder="0" allowtransparency allowfullscreen></iframe>`;	
    
    // console.log(frameValue);
    
    $('.srch-search-results .card-group').html("");
	
    // $('body')[0].innerHTML += frameValue;
    
    $('.srch-search-results .card-group').append(frameValue)
	$('iframe:last').prop('src', songLink)
	

}
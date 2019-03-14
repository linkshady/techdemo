<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="controller.js"></script>
  
</head>
<body class = "background">
<div class="container-fluid">
	<button id="button"> CLIC KHERE TO ADD MORE</button>
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center titleText" id="textBonus">
				{{variable}} Bonuses for You to Use Now
			</h3>
			<div class="row cuponContainer" id = "bonus">
				<div class="col-sm-5 bonus" >
					<span class="bonusIcon">
					</span>
					<blockquote class="blockquote text-right " stye="width: 92%;">
						<p class="mb-0 cuponText">
							£10 FREE BINGO BONUS TO USE NOW
						</p>
						</blockquote>
    			<div class="row">
    				<button type="button" class="btn  btn-sm btn-primary bingoButton">
							Play Bingo
						</button>
    			</div>
				</div>
			</div>
			<h3 class="text-center">
			</h3>
			<h3 class="text-center  titleText" id="depositOfferText">
				Also Pick One of {{variable}} Deposit Offers
			</h3>
<div class="row cuponContainer" id = "depositOffer">
				<div class="col-sm-5 deposit" >
					<blockquote class="blockquote text-right " stye="width: 92%;">
						<p class="mb-0 cuponText">
							1ST DEPOSIT OFFER 300% BINGO BONUS +100 FREE SPINS
						</p>
						</blockquote>
    			<div class="row">
    				<button type="button" class="btn  btn-sm btn-primary depositButton">
							Deposit To Claim
						</button>
    			</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<script>
// $(document).ready(function(){
//   $("button").click(function(){
//     $.get("bonus.json", function(data, status){
//       ("#bonus").append('<div class="col-md-6"><blockquote class="blockquote text-right"><p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p><footer class="blockquote-footer">Someone famous in <cite>Source Title</cite></footer></blockquote> <button type="button" class="btn btn-block btn-sm btn-primary">Button</button></div>')
//     });
//   });
// });

$(document).ready(function(){
  $("#button").click(function(){
    
    $.get( "bonus.json", function( data ) {
    	 var numberBonuses = getId($("#textBonus").text());
    	 var numberOffers = getId($("#depositOfferText").text());
    	 
    	 if(numberBonuses != null){
    		 $("#textBonus").text(function () {
    				return $(this).text().replace(numberBonuses.toString(), data.Bonus.length + parseInt(numberBonuses)); 
					});
    	 }else{
    	 	 $("#textBonus").text(function () {
    				return $(this).text().replace("{{variable}}", data.Bonus.length+1); 
					});
    	 }
    	 
    	 if(numberOffers != null && numberOffers > 1){
    		 $("#depositOfferText").text(function () {
    				return $(this).text().replace(numberOffers.toString(), data.DepositOffer.length + parseInt(numberOffers)); 
					});
    	 }else{
    	 	 $("#depositOfferText").text(function () {
    				return $(this).text().replace("{{variable}}", data.DepositOffer.length+1); 
					});
    	 }


      data.Bonus.forEach(function(value, index){

	    $( "#bonus" ).append(
	          '<div class="col-sm-5 bonus" >'+
						'<blockquote class="blockquote text-right" stye="width: 92%;">'+
							'<p class="mb-0 cuponText">'+
								''+value.title+''+
							'</p>'+
						'</blockquote>'+ 
	    			'<div class="row">'+
	    				'<button type="button" class="btn  btn-sm btn-primary bingoButton">'+
								''+value.button+''+
							'</button>'+
					'</div>')
	    }, "json" );
	    
     data.DepositOffer.forEach(function(value, index){
    	$( "#depositOffer" ).append(
	    	'<div class="col-sm-5 deposit" >'+
					'<blockquote class="blockquote text-right" stye="width: 92%;">'+
						'<p class="mb-0 cuponText">'+
							''+value.title+''+
						'</p>'+
					'</blockquote>'+ 
	    			'<div class="row">'+
	    				'<button type="button" class="btn  btn-sm btn-primary depositButton">'+
								''+value.button+''+
							'</button>'+
					'</div>')
	  	 }, "json" );
    
    
    
    
      })


// $.get( "ajax/test.html", function( data ) {
//   $( ".result" ).html( data );
//   alert( "Load was performed." );
// });
    
  });
  
  function getId(str)
{
	//console.log(str.match(/\d+/g).map(Number))
		//return str.match(/\d+/g).map(Number);
     return str.match(/\d+/);
}
$("#button").trigger("click");

});
</script>
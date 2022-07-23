<?php
    function component($pname, $pprice, $pimage, $pid){
    	$element = "
    		<form method=\"POST\" action=\"Session.php\" novalidate>
                <div class=\"shop\">
                <div class=\"card shadow\">
                    <span class=\"item-name\">
                            $pname
                    </span>

                    <div>
                        <img src=\"Menu/$pimage\" class=\"cheese\">
                    </div>
                    <div class=\"sdetails\">
                        <span class=\"price\">GHc $pprice</span>
                        <span><button type=\"submit\" class=\"butn\" name=\"add\">Add to cart <i class=\"fas fa-shopping-cart\"></i></button></span>
                        <input type=\"hidden\" name=\"pid\" value=\"$pid\"></input>
                    </div>
                </div>
             	</div>
            </form>

    	";
    	echo $element;
    }



function cartElement($pimage, $pname, $pprice, $pid){
	$element = "
	<div class=\"cart-items\">
        					<div class=\"border rounded\">
        						<div class=\"row bg-white\">
        							<div class=\"col-md-3 pl-0\">
        								<img src=\"Menu/$pimage\" class=\"img-fluid\">
        							</div>
        							<div class=\"col-md-4\">
        								<h5 class=\"pt-2 butpad\">$pname</h5>
        								<h5 class=\"pt-2 butpad\">GHc $pprice</h5>
        								<span class=\"butpad\">
        								<button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
        								<button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\" formaction=\"addtocart.php?action=remove&id=$pid\">Remove</button>
        								</span>
        								<input type=\"hidden\" name=\"pid\" value=\"$pid\"></input>        								   
        								<input type=\"hidden\" name=\"pprice\" value=\"$pprice\"></input>
        								<input type=\"hidden\" name=\"pimage\" value=\"$pimage\"></input>

        							</div>
        
        							<div class=\"col-md-2 py-5\">
        								<div>
        									<input placeholder=\"Qty\" id=\"input-quantity\" class=\"form-control d-inline\" value=\"1\" name=\"qty[]\" type=\"number\" min=\"1\" max=\"20\">
        								</div>
        							</div>
        						</div>
        					</div>
     </div>
	";


	echo $element;
}



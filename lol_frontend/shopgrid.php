<?php
include "header.php";
?>
    <!-- Product Area Start -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-widget-area mobile-sidebar">
                        <div class="sidebar-widget-header d-block d-lg-none">
                            <div class="widget-header-wrap">
                                <h5 class="offcanvas-title">Filter</h5>
                                <button type="button" class="btn-close text-reset sidebar-close"></button>
                            </div>
                        </div>
                        <div class="single-widget search-widget">
                            <h3 class="widget-title">Search Here</h3>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="searchwidget" name="searchwidget" placeholder="Product Store">
                                    <button type="button" class="search-btn"><i class="flaticon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="single-widget size-widget">
                            <h3 class="widget-title">Size</h3>
                            <div id="size" class="size-list">
                        </div></div></div></div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                        url: "ajax.php?action=listsize", 
                        type: "POST",
                        data: {                        
                        },
                        //cache: false,
                        success: function(result){
                            // console.log(result);
                        
                            $("#size").html(result); 
                        }
                });
     
					$.ajax({
						url: 'ajax.php?action=productlists',
						type: 'post',
						data: {
                            category:<?php echo $_GET["category"] ?>
                        },
						success: function(response){
                            console.log(response);
                            $("#listproduct").html(response);
                            var  len = document.querySelectorAll(".single-grid-product").length;
                            $(".shoing-result").html('Showing 1 - '+len+' of '+len+' result');
                        }
                    });
                $('#searchwidget').on('input', function(){
				var searchname = $(this).val().trim();
                   
                        $.ajax({
                            url: "ajax.php?action=searchshopgrid",  
                            type: 'post',
                            data: {searchname: searchname,category:<?php echo $_GET["category"] ?>},
                            success: function(response)
                            {
                                console.log(response);
                                $("#listproduct").html(response);  
                            }
                        });
                  
                });

                $('#minprice').on('input', function(){
				var min = $(this).val().trim();
                //console.log(min);
                   if(min==''){
                    $.ajax({
						url: 'ajax.php?action=productlists',
						type: 'post',
						data: {
                            category:<?php echo $_GET["category"] ?>
                        },
						success: function(response){
                            console.log(response);
                            $("#listproduct").html(response);
                            var  len = document.querySelectorAll(".single-grid-product").length;
                            $(".shoing-result").html('Showing 1 - '+len+' of '+len+' result');
                        }
					});
                   }});


                $('#maxprice').on('input', function(){
				var max = $(this).val().trim();
                //console.log(min);
                   if(max==''){
                    $.ajax({
						url: 'ajax.php?action=productlists',
						type: 'post',
						data: {
                            category:<?php echo $_GET["category"] ?>
                        },
						success: function(response){
                            console.log(response);
                            $("#listproduct").html(response);
                            var  len = document.querySelectorAll(".single-grid-product").length;
                            $(".shoing-result").html('Showing 1 - '+len+' of '+len+' result');
                        }
					});
                   }});
});
    function pricelist()
                {
                    var min = $('#minprice').val().trim();
                    var max = $('#maxprice').val().trim();
                        $.ajax({
                                url: "ajax.php?action=searchpriceshopgrid",  
                                type: 'post',
                                data: {
                                    min: min,
                                    max: max,
                                    category:<?php echo $_GET["category"] ?>
                                },
                                success: function(response)
                                {
                                    console.log(response);
                                    $("#listproduct").html(response);  
                                }
                            });}
    
    function toggleCheckbox(e){
        $("input:checkbox[name=checkbox]:checked").each(function(){
            $(this).prop("checked",false);
        });
        $(e).prop("checked",true);
        $.ajax({
                    url: "ajax.php?action=sizeshow2",  
                    type: 'post',
                    data: {
                        size: e.value,
                        category:<?php echo $_GET["category"] ?>
                    },
                    success: function(response)
                    {
                        console.log(response);
                        $("#listproduct").html(response);  
                    }
                });}
    </script>
    <?php include "footer.php"; ?>

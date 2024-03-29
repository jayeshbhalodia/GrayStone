/**
 * Pyro object
 *
 * The Pyro object is the foundation of all PyroUI enhancements
 */
var pyro = {};

jQuery(function($) {
       
    /**
	 * This initializes all JS goodness
	 */
    pyro.init = function() {

        $(".datepicker").datepicker({
            dateFormat: 'dd-mm-yy'
        });
        $("#main-nav li ul").hide();
        $("#main-nav li a.current").parent().find("ul").toggle();
        $("#main-nav li a.current:not(.no-submenu)").addClass("bottom-border");

        $("#main-nav li a.top-link").click(function () {
            if($(this).hasClass("no-submenu"))
            {
                return false;
            }
            $(this).parent().siblings().find("ul").slideUp("normal");
            $(this).parent().siblings().find("a").removeClass("bottom-border");
            $(this).next().slideToggle("normal");
            $(this).toggleClass("bottom-border");
            return false;
        });

        $("#main-nav li a.no-submenu").click(function () {
            window.location.href = $(this).attr("href");
            return false;
        });


    };

    $(document).ready(function() {
        pyro.init();
                
    });
	
	
});

( function($) {
    $(document).ready(function(){
     
        $('.pagination a').live('click',function(){
            return false;
        });
        $('.search').live('click',function(){
            $.ajax({
                type: "POST",
                url: $('#page_path').val(),
                data:$('#search').serialize(),        
                success: function(html){
                    $(".data-grid").html(html);
                }    
            });
         
        });
        
    });
} ) ( jQuery );


//for ajax loading
//$('<div id="ajax-load"></div><div id="ajax-load-inner"></div>')
//    .ajaxStart(function() {
//        $(this).show();          
//    })
//    .ajaxStop(function() {
//        $(this).hide();
//    })
//    .appendTo('body');


//for pagination
function pagination(div,url,parm){
        
    if(parm!=""){
        $.ajax({
            type: "POST",
            url: url,
            data: parm+'&'+$('#search').serialize(),
            success: function(html){
                $("."+div).html(html).css('display','none').fadeIn('slow');
            }
    
        });
    }
  
}
/**
 * to check Multiple Checkbox
 * @action_id action element Id
 * @multiple checked element Id 
 */
function multiple_check_all($action_id,$child_element_id)
{
    $($action_id).live("click",function(event)
    {
        if($($action_id).hasClass('checkbox-checked'))
        {
            $($action_id).removeClass('checkbox-checked');
            $($child_element_id).attr('checked',false);
            
        }
        else
        {
            $($action_id).addClass('checkbox-checked');
            $($child_element_id).attr('checked',true);
        }
    });
}
//execute for default Multiple checkbox checked function.
multiple_check_all("#check-all-action","input[name='action_to[]']");


/**
 * End function.js
 * theme/admin/js/function.js
 */
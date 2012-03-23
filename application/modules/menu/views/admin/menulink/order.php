<script>
    $(document).ready(function(){

        $('ol.sortable').nestedSortable({
            disableNesting: 'no-nest',
            forcePlaceholderSize: true,
            handle: 'div',
            helper: 'clone',
            items: 'li',
            maxLevels: 3,
            opacity: .6,
            placeholder: 'placeholder',
            revert: 250,
            tabSize: 25,
            tolerance: 'pointer',
            toleranceElement: '> div'
        });

        $('#serialize').click(function(){
            serialized = $('ol.sortable').nestedSortable('serialize');
            //$('#serializeOutput').text(serialized+'\n\n');
            $.ajax({
                type: "POST",
                url:'menu/admin/menulink/ajax_save_menulinks',
                data: serialized,
                success: function(html){
//                    $("."+div).html(html).css('display','none').fadeIn('slow');
                }
    
            });
            
        })
        //
        //		$('#toHierarchy').click(function(e){
        //			hiered = $('ol.sortable').nestedSortable('toHierarchy', {startDepthCount: 0});
        //			hiered = dump(hiered);
        //			(typeof($('#toHierarchyOutput')[0].textContent) != 'undefined') ?
        //			$('#toHierarchyOutput')[0].textContent = hiered : $('#toHierarchyOutput')[0].innerText = hiered;
        //		})
        //
        //		$('#toArray').click(function(e){
        //			arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
        //			arraied = dump(arraied);
        //			(typeof($('#toArrayOutput')[0].textContent) != 'undefined') ?
        //			$('#toArrayOutput')[0].textContent = arraied : $('#toArrayOutput')[0].innerText = arraied;
        //		})

    });
</script>
<style type="text/css">

    .placeholder {
        background-color: #cfcfcf;
    }

    .ui-nestedSortable-error {
        background:#fbe3e4;
        color:#8a1f11;
    }

    ol {
        margin: 0;
        padding: 0;
        padding-left: 30px;
    }

    ol.sortable, ol.sortable ol {
        margin: 0 0 0 25px;
        padding: 0;
        list-style-type: none;
    }

    ol.sortable {

    }

    .sortable li {
        margin: 7px 0 0 0;
        padding: 0;
    }

    .sortable li div  {
        border:solid 1px #8a8a8a;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        padding:5px;
        padding-left:13px;
        margin: 0;
    }

    h1 {
        font-size: 2em;
        margin-bottom: 0;
    }

    h2 {
        font-size: 1.2em;
        font-weight: normal;
        font-style: italic;
        margin-top: .2em;
        margin-bottom: 1.5em;
    }

    h3 {
        font-size: 1em;
        margin: 1em 0 .3em;;
    }

    p, ol, ul, pre, form {
        margin-top: 0;
        margin-bottom: 1em;
    }

    dl {
        margin: 0;
    }

    dd {
        margin: 0;
        padding: 0 0 0 1.5em;
    }

    code {
        background: #e5e5e5;
    }

    input {
        vertical-align: text-bottom;
    }

    .notice {
        color: #c33;
    }
</style>
<div class="data-grid">
    <?php if (!empty($menulinks)): ?>

        <div class="well">
            <?php echo $menulinks; ?>
        </div>    
    
        <div class="well list-bottom">
            <div class="span2">
                <button class="btn btn-large" id="serialize" name="save" type="submit" value="save">Save Order</button>
            </div>
            <pre id="serializeOutput"></pre>
        </div>

    <?php else: ?>
        <div class="well">

            <h3>No Menu Links has been created yet.</h3>

        </div>
    <?php endif; ?>
</div>


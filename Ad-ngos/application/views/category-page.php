<div class="container">
    <div style="width: 80%;padding: 10px 100px 50px 100px" class="hideelement jumbotron col-lg-offset-1" id="div-form">
        <div style="float: right"><a href="#" onclick="cancel()" class="easyui-linkbutton" iconCls="icon-cancel" plain="true">Cancel</a></div>
        <form name="f-add-category" method="post" action="<?php echo base_url() ?>index.php/category/insert"> 
            <h3 id="title"></h3>
            <br><br>             
            <input type="hidden" name="action" value="add" />                               
            <label>Name (English)</label><br>
            <input id="txname-en" type="text" style="width: 100%"  name="name_en" class="textbox"/><br>
            <label>Name (Khmer)</label><br>
            <input id="txname-kh"  type="text" style="width: 100%" name="name_kh" class="textbox"/><br>
            <label>Logo</label><br>
            <input id="txlogo"  type="text" style="width: 100%" name="logo" class="textbox"/><br><br>
            <a id="save" href="#" onclick="doedit('<?php echo base_url() ?>index.php/category/edit')" 
               class="easyui-linkbutton hideelement" iconCls="icon-save" plain="true">SAVE</a>              
            <a id="savenew"href="#" onclick="doinsert('<?php echo base_url() ?>index.php/category/insert')" 
               class="easyui-linkbutton hideelement" iconCls="icon-save" plain="true">SAVE</a>                                        
        </form>
        <br><br>
        <div  style="float: left;padding: 0px 10px 0px 0px" >
            <img id="image" width="150px" height="150px" src="<?php echo base_url(); ?>img/na.png"/>
        </div>
        <div>
            <?php
            if (isset($error)) {
                echo $error;
            }
            ?>
            <?php echo form_open_multipart(base_url() . 'index.php/upload/do_upload'); ?>
            <input type="hidden" name="view" value="category-page"/>
            <input type="hidden" name="path" value="img/category/"/>
            <input type="file" name="userfile" size="20" class="botton"/>
            <br /><br />
            <input type="submit" value="upload" class="botton"/>            
            </form>
            <h4>Upload photo of Category hear.</h4>
        </div>
    </div>    
    <div id="div-table">
        <table id="tbl-category" class="easyui-datagrid" title="Category" style="width:100%;height:550px;"                
               data-options="
               rownumbers:true,
               singleSelect:true,method:'post',
               striped:true,
               fitColumns:true,nowrap:false,
               pagination:true,collapsible:true,
               remoteSort:true,multiSort:true,
               toolbar:'#toolbar_major_list',
               url:'<?php echo base_url() ?>index.php/category/getcategorylist'">
            <thead>
                <tr>                    
                    <th data-options="field:'name_en',width:'45%',sortable:true">Name(English)</th>                    
                    <th data-options="field:'name_kh',width:'45%',sortable:true">Name(Khmer)</th>                    
                    <th data-options="field:'logo',width:'10%'">Logo</th>                    
                </tr>
            </thead>
        </table>   

        <div id="toolbar_major_list" style="padding:2px 5px;">            
            <a href="#" onclick="addshow()"  class="easyui-linkbutton" iconCls="icon-add" plain="true">New</a>                
            <a href="#" onclick="doselect()"  class="easyui-linkbutton" iconCls="icon-edit" plain="true">Edit</a>                
            <a href="#" onclick="dodelete('<?php echo base_url() ?>index.php/category/delete')" 
               class="easyui-linkbutton" iconCls="icon-remove" plain="true">Remove</a>              
            <input class="easyui-searchbox" data-options="prompt:'Search Here',searcher:doSearch" style="width:15%"/>
        </div>
    </div>   
</div>
<script type="text/javascript">
    function doinsert(url) {
        var n_en = document.getElementById("txname-en").value;
        var n_kh = document.getElementById("txname-kh").value;
        var logo = document.getElementById("txlogo").value;
        $(location).attr('href', url + "?name_en=" + n_en + "&name_kh=" + n_kh
                + "&logo=" + logo);
    }
    function doedit(url) {
        var row = $('#tbl-category').datagrid('getSelected');
        if (row) {
            var n_en = document.getElementById("txname-en").value;
            var n_kh = document.getElementById("txname-kh").value;
            var logo = document.getElementById("txlogo").value;
            $(location).attr('href', url + "?cat_id=" + row.cat_id +
                    "&name_en=" + n_en + "&name_kh=" + n_kh + "&logo=" + logo);
        } else {
            alert("Please select one user before edit.");
        }
    }
    function dodelete(url) {
        var row = $('#tbl-category').datagrid('getSelected');
        if (row) {
            $(location).attr('href', url + "?cat_id=" + row.cat_id);
        } else {
            alert("Please select one user before edit.");
        }
    }
    function doselect() {
        var row = $('#tbl-category').datagrid('getSelected');
        if (row) {
            editshow();
            document.getElementById("txname-en").value = row.name_en;
            document.getElementById("txname-kh").value = row.name_kh;
            document.getElementById("txlogo").value = row.logo;
            if (row.logo === '') {
                $('#image').attr('src', '<?php echo base_url(); ?>img/na.png');
            } else {
                $('#image').attr('src', '<?php echo base_url(); ?>img/category/' + row.logo);
            }
        } else {
            alert("Please select one user before edit.");
        }
    }
    function doview() {
        var row = $('#tbl-category').datagrid('getSelected');
        if (row) {
            editshow();
            document.getElementById("txname-en").value = row.name_en;
            document.getElementById("txname-kh").value = row.name_kh;
            document.getElementById("txlogo").value = row.logo;
            if (row.logo === '') {
                $('#image').attr('src', '<?php echo base_url(); ?>img/na.png');
            } else {
                $('#image').attr('src', '<?php echo base_url(); ?>img/category/' + row.logo);
            }
        } else {
            alert("Please select one user before edit.");
        }
    }
    function doSearch(value) {
        var url = "";
        if (value) {
            url = "<?php echo base_url(); ?>index.php/category/like/" + value;
        } else {
            url = "<?php echo base_url(); ?>index.php/category/getcategorylist";
        }
        $('#tbl-category').datagrid({url: url});
    }
    function addshow() {
        $('#title').text('Create New Category');
        $('#txname-en').val('');
        $('#txname-kh').val('');
        $('#txlogo').val('');
        $('#div-form').toggleClass('hideelement');
        $('#div-navbar').toggleClass('hideelement');
        $('#div-table').toggleClass('hideelement');
        $('#title').text('Edit Esisting Category');
        $('#savenew').toggleClass('hideelement');
    }
    function editshow() {
        $('#div-form').toggleClass('hideelement');
        $('#div-navbar').toggleClass('hideelement');
        $('#div-table').toggleClass('hideelement');
        $('#save').toggleClass('hideelement');
    }
    function cancel() {        
        $('#title').text('Edit Esisting Category');
        $('#div-form').toggleClass('hideelement');
        $('#div-navbar').toggleClass('hideelement');
        $('#div-table').toggleClass('hideelement');
        if (!$('#save').hasClass('hideelement')) {
            $('#save').toggleClass('hideelement');
        }
        if (!$('#savenew').hasClass('hideelement')) {
            $('#savenew').toggleClass('hideelement');
        }
    }
</script>


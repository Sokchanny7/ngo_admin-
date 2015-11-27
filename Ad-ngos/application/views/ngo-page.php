<div class="container">
    <div id="div-main" style="width: 80%;padding: 10px 100px 50px 100px" class="jumbotron col-lg-offset-1 hideelement"  >        
        <div id="div-insert" class="hideelement">
            <form id='frm-insert' action="<?php echo base_url(); ?>index.php/ngo/insert" method="post">           
                <div style="float: right"><a  href="#" onclick="addnew()" class="easyui-linkbutton" iconCls="icon-cancel" plain="true">Cancel</a></div>
                <h3>Create New NGO</h3><br>
                <input type="hidden" name="cat_id" id="cat-id"/>
                <label>Category</label>                   
                <br>
                <select id="list-cat" style="width: 100%" class="textbox">  
                    <?php
                    foreach ($categroy->result() as $row) {
                        echo "<option ";
                        echo "value='";
                        echo $row->cat_id;
                        echo "'>";
                        echo $row->name_en;
                        echo "</option>";
                    }
                    ?>
                </select>
                <br>
                <label>Name (English)</label>
                <input style="width: 100%" type="text" name="name_en" class="textbox"/>                
                <br>
                <label>Name (Khmer)</label>
                <br>
                <input style="width: 100%"   type="text" name="name_kh" class="textbox"/>
                <br>
                <label>Name (Short)</label>
                <br>
                <input style="width: 100%" type="text" name="name_short" class="textbox"/>
                <label>Logo</label><br>
                <input id="txlogo"  type="text" style="width: 100%" name="logo" class="textbox"/><br><br>
                <label>Phone</label>
                <input style="width: 100%" type="text" name="phone" class="textbox"/><br>
                <label>Email</label><br>
                <input style="width: 100%"   type="text" name="email" class="textbox"/><br>
                <label>Website</label><br>
                <input style="width: 100%" type="text" name="website" class="textbox"/>
                <label>Address</label><br>
                <input type="text" style="width: 100%" name="address" class="textbox"/><br><br>
                <label>Description</label><br>
                <textarea type="text" style="width: 100%" rows = "4" cols = "50" name="description" class="textbox"></textarea><br><br>
                <label>Map</label><br>
                <input type="text" style="width: 100%" name="map" class="textbox" class="textbox"/><br><br>
                <a href="#" onclick="doadd()" 
                   class="easyui-linkbutton" iconCls="icon-save" plain="true">SAVE</a>                                          
                <br><br>           
            </form>            
        </div>

        <!--<div style="float: left;width: 80%;padding: 10px 100px 50px 100px" class="hideelement jumbotron col-lg-offset-1" id="div-edit">-->
        <div id="div-edit" class="hideelement">
            <form id='frm-edit' action="<?php echo base_url(); ?>index.php/ngo/edit" method="post">
                <input type="hidden" name="ngo_id_e" id="ngo-id-e"/>
                <input type="hidden" name="cat_id_e" id="cat-id-e"/>
                <div style="float: right"><a  href="#" onclick="hideedit()" class="easyui-linkbutton" iconCls="icon-cancel" plain="true">Cancel</a></div>
                <h3>Edit Existing NGO</h3><br>
                <label>Category</label>                   
                <br>
                <select id="list-cat-e" style="width: 100%" class="textbox">  
                    <?php
                    foreach ($categroy->result() as $row) {
                        echo "<option ";
                        echo "value='";
                        echo $row->cat_id;
                        echo "'>";
                        echo $row->name_en;
                        echo "</option>";
                    }
                    ?>
                </select>
                <br>
                <label>Name (English)</label>
                <input id="txname-en" style="width: 100%" type="text" name="name_en_e" class="textbox"/>                
                <br>
                <label>Name (Khmer)</label>
                <br>
                <input id="txname-kh" style="width: 100%"   type="text" name="name_kh_e" class="textbox"/>
                <br>
                <label>Name (Short)</label>
                <br>
                <input id="txname-short"  style="width: 100%" type="text" name="name_short_e" class="textbox"/>
                <label>Logo</label><br>
                <input id="tx-logo"  type="text" style="width: 100%" name="logo_e" class="textbox"/><br><br>

                <label>Phone</label>
                <input id="tx-phone" style="width: 100%" type="text" name="phone_e" class="textbox"/><br>
                <label>Email</label><br>
                <input id="tx-email" style="width: 100%"   type="text" name="email_e" class="textbox"/><br>
                <label>Website</label><br>
                <input id="tx-website"  style="width: 100%" type="text" name="website_e" class="textbox"/>
                <label>Address</label><br>
                <input id="tx-address"  type="text" style="width: 100%" name="address_e" class="textbox"/><br><br>
                <label>Description</label><br>
                <textarea id="tx-descripton"  type="text" style="width: 100%" rows = "4" cols = "50" name="description_e" class="textbox"></textarea><br><br>
                <label>Map</label><br>
                <input id="tx-map"  type="text" style="width: 100%" name="map_e" class="textbox"/><br><br>                       
                <a href="#" onclick="doedit()" 
                   class="easyui-linkbutton" iconCls="icon-save" plain="true">SAVE</a>                                          
                <br><br>                       
            </form>               
        </div>

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
            <input type="hidden" name="view" value="ngo-page"/>
            <input type="hidden" name="path" value="img/ngo/"/>
            <input type="file" name="userfile" size="20" id="img-name" class="botton"/>
            <br /><br />
            <input type="submit" value="upload" id="bt-upload" class="botton"/>                
            </form>
            <h4>Upload photo of NGO hear.</h4>
        </div>

    </div>

    <div id="div-table">
        <table id="tbl-ngo" class="easyui-datagrid" title="Contant all NGO name" style="width:100%;height:550px;"                
               data-options="
               rownumbers:true,
               singleSelect:true,method:'post',
               striped:true,
               fitColumns:true,nowrap:false,
               pagination:true,collapsible:true,
               remoteSort:true,multiSort:true,
               toolbar:'#toolbar_major_list',
               url:'<?php echo base_url() ?>index.php/ngo/getngoList'">
            <thead>
                <tr>
                    <th data-options="field:'cat_name',width:'10%',sortable:true">Category name</th>                                        
                    <th data-options="field:'name_en',width:'10%',sortable:true">Name (English)</th>
                    <th data-options="field:'name_kh',width:'10%',sortable:true">Name (Khmer)</th>                    
                    <th data-options="field:'name_short',width:'5%'">Name (Short)</th> 
                    <th data-options="field:'phone',width:'10%'">Phone</th>
                    <th data-options="field:'email',width:'10%'">Email</th>                    
                    <th data-options="field:'website',width:'10%'">Website</th>                    
                    <th data-options="field:'address',width:'10%'">Address</th>                                            
                    <th data-options="field:'description',width:'10%'">Description</th>                    
                    <th data-options="field:'map',width:'10%'">Map</th>
                    <th data-options="field:'logo',width:'5%'">Logo</th>                    
                </tr>
            </thead>
        </table>   
    </div>        

    <div  style="float: left">
        <div id="toolbar_major_list" style="padding:2px 5px;">         
            <a href="#" onclick="addnew()"  class="easyui-linkbutton" iconCls="icon-add" plain="true">New</a>                
            <a href="#" onclick="getedit()"  class="easyui-linkbutton" iconCls="icon-edit" plain="true">Edit</a>                
            <a href="#" onclick="dodelete('<?php echo base_url() ?>index.php/ngo/delete')" 
               class="easyui-linkbutton" iconCls="icon-remove" plain="true">Remove</a>              
            <input class="easyui-searchbox" data-options="prompt:'Search Here',searcher:doSearch" style="width:15%">
        </div>
    </div>
</div>
<footer class="nav navbar-fixed-bottom navbar-inverse">
    <p>Body content</p>
</footer>
<script type="text/javascript">
    function doedit() {
        $("#frm-edit").submit();
    }
    function doadd() {
        $("#frm-insert").submit();
    }
    function getedit() {
        var row = $('#tbl-ngo').datagrid('getSelected');
        if (row) {
            $('#txname-en').val(row.name_en);
            $('#txname-kh').val(row.name_kh);
            $('#txname-short').val(row.name_short);
            $("#list-cat-e").val(row.cat_id);
            $('#ngo-name').html(row.ngo_name);
            $('#tx-phone').val(row.phone);
            $('#tx-email').val(row.email);
            $('#tx-website').val(row.website);
            $('#tx-address').val(row.address);
            $('#tx-descripton').val(row.description);
            $('#tx-map').val(row.map);
            $('#tx-logo').val(row.logo);
            $('#ngo-id-e').val(row.ngo_id);
            $('#cat-id-e').val(row.cat_id);
            $('#image').attr('src', '<?php echo base_url(); ?>img/na.png');
            if (row.logo === '') {
                $('#image').attr('src', '<?php echo base_url(); ?>img/na.png');
            } else {
                $('#image').attr('src', '<?php echo base_url(); ?>img/ngo/' + row.logo);
            }
            $('#save').toggleClass('hideelement');
            hideedit();
        } else {
            alert("Please select one user before edit.");
        }
    }
    function dodelete(url) {
        var row = $('#tbl-ngo').datagrid('getSelected');
        if (row) {
            $(location).attr('href', url + "?ngo_id=" + row.ngo_id + "&cat_id=" + row.cat_id);
        } else {
            alert("Please select one user before edit.");
        }
    }
    function doselect() {
        var row = $('#tbl-category').datagrid('getSelected');
        if (row) {
            document.getElementById("txname-en").value = row.name_en;
            document.getElementById("txname-kh").value = row.name_kh;
        } else {
            alert("Please select one user before edit.");
        }
    }

    function doSearch(value) {
        var url = "";
        if (value) {
            url = "<?php echo base_url(); ?>index.php/ngo/like/" + value;
        } else {
            url = "<?php echo base_url(); ?>index.php/ngo/getngoList";
        }
        $('#tbl-ngo').datagrid({url: url});
    }
    function addnew() {
        $('#div-insert').toggleClass('hideelement');
        $('#div-navbar').toggleClass('hideelement');
        $('#div-table').toggleClass('hideelement');
        $('#div-logo').toggleClass('hideelement');
        $('#div-main').toggleClass('hideelement');
        $('#cat-id').val($('#list-cat').val());
    }
    function hideedit() {
        $('#div-edit').toggleClass('hideelement');
        $('#div-navbar').toggleClass('hideelement');
        $('#div-table').toggleClass('hideelement');
        $('#div-logo').toggleClass('hideelement');
        $('#div-main').toggleClass('hideelement');
    }
    $('#list-cat-e').change(function () {
        $('#cat-id-e').val($(this).val());
    });

    $('#list-cat').change(function () {
        $('#cat-id').val($(this).val());
    });
</script>

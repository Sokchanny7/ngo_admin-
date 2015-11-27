
<div class="navbar-collapse collapse" id="navbar">
    <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url() ?>index.php/home">Home</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/category">Category</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/ngo">NGO</a></li>
        <li class="active"><a href="#">Detail of NGO</a></li>            
        <li class="dropdown">
            <a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown">About<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">Contact</a></li>                
                <li><a href="#">About us</a></li>
                <li><a href="<?php echo base_url() ?>index.php/home/logout">Logout</a></li>
            </ul>
        </li>
    </ul>               
</div>
</div>
</nav>
<div style="height: 60px"></div>
<div class="container-fluid">
    <div id="detail"></div>    
    <div>
        <div style="float: left;width: 30%; padding: 5px 5px 5px 5px">
            <form id="frm-ngo-detail" action="<?php echo base_url() ?>index.php/ngodetail/edit" method="post">
                <input type="hidden"  name="ngo_id" id="tx-ngo-id"/>
                <label>NGO Name</label><br>                
                <label id="ngo-name">No selected.</label><br><br>
                <label>Phone</label>
                <input id="tx-phone" style="width: 100%" type="text" name="phone" /><br>
                <label>Email</label><br>
                <input id="tx-email" style="width: 100%"   type="text" name="email" /><br>
                <label>Website</label><br>
                <input id="tx-website"  style="width: 100%" type="text" name="website" />
                <label>Address</label><br>
                <input id="tx-address"  type="text" style="width: 100%" name="address" /><br><br>
                <label>Description</label><br>
                <textarea id="tx-descripton"  type="text" style="width: 100%" rows = "4" cols = "50" name="description" ></textarea><br><br>
                <label>Map</label><br>
                <input id="tx-map"  type="text" style="width: 100%" name="map" /><br><br>
                <a href="#" onclick="doEdit()" 
                   class="easyui-linkbutton" iconCls="icon-save" plain="true">SAVE</a>              
            </form>                              
        </div>
        <div>
            <table id="tbl-ngo-detail" class="easyui-datagrid" title="Detail of NGO" style="width:70%;height:550px;"                
                   data-options="
                   rownumbers:true,
                   singleSelect:true,method:'post',
                   striped:true,
                   fitColumns:true,nowrap:false,
                   pagination:true,collapsible:true,
                   remoteSort:true,multiSort:true,
                   toolbar:'#toolbar_major_list',
                   url:'<?php echo base_url() ?>index.php/ngodetail/getngodtailjson'">
                <thead>
                    <tr>
                        <th data-options="field:'ngo_name',width:'15%',align:'left',sortable:true">Name</th>                                        
                        <th data-options="field:'ngo_name_short',width:'15%',align:'left',sortable:true">Name(Short)</th>                                        
                        <th data-options="field:'phone',width:'10%'">Phone</th>
                        <th data-options="field:'email',width:'10%'">Email</th>                    
                        <th data-options="field:'website',width:'10%'">Website</th>                    
                        <th data-options="field:'address',width:'10%'">Address</th>                                            
                        <th data-options="field:'description',width:'20%'">Description</th>                    
                        <th data-options="field:'map',width:'10%'">Map</th>                    
                    </tr>
                </thead>
            </table>    

            <div id="toolbar_major_list" style="padding:2px 5px;">            
                <a href="#" onclick="getdetail()"  class="easyui-linkbutton" iconCls="icon-edit" plain="true">Edit</a>                            
                <a href="#" onclick="dodelete('<?php echo base_url() ?>index.php/ngodetail/delete')" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Remove</a>
                <input class="easyui-searchbox" data-options="prompt:'Search Here',searcher:doSearch" style="width:15%"> 
            </div>
        </div>
    </div>
</div>


<footer class="nav navbar-fixed-bottom navbar-inverse">
    <p>Body content</p>
</footer>
<script type="text/javascript">
    function doEdit() {
        var row = $('#tbl-ngo-detail').datagrid('getSelected');
        if (row) {
            $('#frm-ngo-detail').submit();
        }else{
            alert("Please select one user before edit and save.");
        }
    }
    function dodelete(url) {
        var row = $('#tbl-ngo-detail').datagrid('getSelected');
        if (row) {
            $(location).attr('href', url + "/" + row.ngo_id);
        } else {
            alert("Please select one user before remove.");
        }
    }

    function getdetail() {
        var row = $('#tbl-ngo-detail').datagrid('getSelected');
        if (row) {
            $('#ngo-name').html(row.ngo_name);
            $('#tx-phone').val(row.phone);
            $('#tx-email').val(row.email);
            $('#tx-website').val(row.website);
            $('#tx-address').val(row.address);
            $('#tx-descripton').val(row.description);
            $('#tx-map').val(row.map);
            $('#tx-ngo-id').val(row.ngo_id);
            //showDialog('detail', '<?php // echo base_url()  ?>index.php/ngodetail/detail/' + row.ngo_id, row.ngo_name, '1000', '600');
        } else {
            alert("Please select one user before edit.");
        }

    }
    function showDialog(id, url, title, w, h) {
        if (w == '')
            w = 450;
        if (h == '')
            h = 300;
        $('#' + id).dialog({
            modal: true,
            href: url,
            height: h,
            width: w,
            closed: false,
            cache: false,
            title: title,
        });
    }
    function doSearch(value) {
        var url = "";
        if (value) {
            url = "<?php echo base_url(); ?>index.php/ngodetail/like/" + value;
        } else {
            url = "<?php echo base_url(); ?>index.php/ngodetail/getngodtailjson";
        }
        $('#tbl-ngo-detail').datagrid({url: url});
    }
</script>

<h3 class="box-title" align="center">List Kebutuhan Skema Kredit</h3>
   <button class="btn btn-success waves-effect waves-light btn-sm" onclick="showform()" type="button"><i class="fa fa-plus"></i> Tambah List</button>
   <button class="btn btn-primary waves-effect waves-light btn-sm" style="float:right;" onclick="getform('setting_content')" type="button"><i class="fa fa-Left"></i> Kembali</button>

    <table class="table table-striped table-bordered" id="table_form" width="100%">
        <thead>
            <tr>
                <th width="10%">No</th>
                <th>Daftar Skema Kredit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            $i=1;
            foreach ($kebutuhan_skema_kredit as $row){
                echo '<tr>';
                echo '<td>'. $i++ .'</td>';
                echo '<td>'. $row['kebutuhan_skema_kredit'] .'</td>'; 
                echo '<td><button class="btn btn-danger waves-effect waves-light btn-sm" style="float:right;" onclick="dellist(\''. $row['id_cluster_kebutuhan_skema_kredit'] .'\')" type="button"><i class="fa fa-close"></i> Hapus</button> <button class="btn btn-warning waves-effect waves-light btn-sm" style="float:right;" onclick="showform(\''. $row['id_cluster_kebutuhan_skema_kredit'] .'\',\''. $row['kebutuhan_skema_kredit'] .'\')" type="button"><i class="fa fa-pencil"></i> Ubah</button></td>';
            }
          ?>
        </tbody>
    </table>


    <div class="modal " id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="mod-content">
                        <form>
                            <div class="col-sm-12">
                                <label for="thedata" class="col-sm-12 control-label">
                                    <h3 align="center">Form kebutuhan_sarana</h3>
                                </label>
                            </div>
                            <div class="form-group" style="width: 0">
                                <input type="hidden" class="form-control dform" id="idsk" placeholder="required" value="">
                            </div>

                            <div class="form-group required">
                                <label class="control-label">Kebutuhan Skema Kredit</label>
                                <input type="text" pattern="[a-zA-Z]" class="form-control dform required" id="issk" value="" placeholder="required" required>
                            </div>
                            </br>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                        <button class="btn btn-primary waves-effect waves-light" onclick="$('#modal').hide();">Batal</button>
                        <button class="btn btn-success waves-effect waves-light" id="sbt" onclick="sendform();">Kirim</button>
                </div>
         </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {$('#table_form').DataTable();});
       
        function showform(i=null,j=null){
            document.getElementById("idsk").value="";
            if (i==null){
                $(".dform").value="";
            }
            else {
                document.getElementById("idsk").value=i;
                document.getElementById("issk").value=j;
            }
            $("#modal").show();
        }

        function sendform(){
            var data={
                idsk : $('#idsk').val(),
                issk : $('#issk').val(),
            }
            var notif   = "Update Kebutuhan Sarana Berhasil "
            var address = "./setting/up_kebutuhan_skema_kredit";
            var element = "setting_content";
            sendajax(data, address, element, notif, null);
            $("#modal").hide();
        }

        function dellist(i){
            if (confirm("apakah anda Yakin Menghapus Data ini?")){
                var data={
                    idsk : i,
                }
                var notif   = "Hapus Kebutuhan Sarana Berhasil "
                var address = "./setting/dis_kebutuhan_skema_kredit";
                var element = "setting_content";
                sendajax(data, address, element, notif, null);
                $("#modal").hide();
            }
        }
        
    </script>
<?php
require_once('../config.php');
require_once('inc/sess_auth.php');
include_once 'header.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
if($_settings->chk_flashdata('success')): ?>
    <script>
      alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
    </script>
<?php endif;?>
        <div class="container-xxl flex-grow-1 container-p-y">
            <?php
            if(!file_exists($page.".php") && !is_dir($page)){
                include '404.html';
            }else{
                if(is_dir($page)) {
                    include $page . '/index.php';
                }
                else {
                    include $page . '.php';
                }

            }
            ?>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
              ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              , copyright
              <a href="#" target="_blank" class="footer-link fw-bolder">PMS</a>
            </div>

          </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>

<div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary rounded-0" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
                <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md rounded-0" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span class="fa fa-arrow-right"></span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
            </div>
            <div class="modal-body">
                <div id="delete_content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary rounded-0" id='confirm' onclick="">Continue</button>
                <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal"><span class="fa fa-times"></span></button>
            <img src="" alt="">
        </div>
    </div>
</div>

      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../sneat/assets/vendor/libs/jquery/jquery.js"></script>
<script src="../sneat/assets/vendor/libs/popper/popper.js"></script>
<script src="../sneat/assets/vendor/js/bootstrap.js"></script>
<script src="../sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../sneat/assets/vendor/libs/hammer/hammer.js"></script>
<script src="../sneat/assets/vendor/libs/i18n/i18n.js"></script>
<script src="../sneat/assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="../sneat/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>

<script src="../sneat/assets/vendor/js/menu.js"></script>
<script src="../sneat/assets/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="../sneat/assets/js/main.js"></script>

<!-- Page JS -->
<script>
    $(document).ready(function(){
        window.viewer_modal = function($src = ''){
            start_loader()
            var t = $src.split('.')
            t = t[1]
            if(t =='mp4'){
                var view = $("<video src='"+$src+"' controls autoplay></video>")
            }else{
                var view = $("<img src='"+$src+"' />")
            }
            $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
            $('#viewer_modal .modal-content').append(view)
            $('#viewer_modal').modal({
                show:true,
                backdrop:'static',
                keyboard:false,
                focus:true
            })
            end_loader()

        }
        window.uni_modal = function($title = '' , $url='',$size=""){
            start_loader()
            $.ajax({
                url:$url,
                error:err=>{
                    console.log()
                    alert("An error occured")
                },
                success:function(resp){
                    if(resp){
                        $('#uni_modal .modal-title').html($title)
                        $('#uni_modal .modal-body').html(resp)
                        if($size != ''){
                            $('#uni_modal .modal-dialog').addClass($size+'  modal-dialog-centered')
                        }else{
                            $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
                        }
                        $('#uni_modal').modal({
                            show:true,
                            backdrop:'static',
                            keyboard:false,
                            focus:true
                        })
                        end_loader()
                    }
                }
            })
        }
        window._conf = function($msg='',$func='',$params = []){
            $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
            $('#confirm_modal .modal-body').html($msg)
            $('#confirm_modal').modal('show')
        }
    })
</script>
</body>
</html>

 <div class="container-fluid bg-dark">
     <div class="container">
         <div class="row footer">
             <div class="col-lg m-4">
                 <h5>Official Address</h5>
                 <p class="footer text-monospace">Arta Barber and Chill, Jalan Serma Taruna Ramli, No. 12, Kota Baru, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta.</p>

                 <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d494.1281698990209!2d110.37172902110423!3d-7.787135858900388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58481fdfd005%3A0x7f750f433fdf7b60!2sArta%20Barber%20Cafe!5e0!3m2!1sen!2sid!4v1589794831992!5m2!1sen!2sid" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                 </div>
             </div>
             <div class="col-lg m-4">
                 <h5>Follow us on</h5>
                 <div class="footer-social-icons">
                     <div class="row social-icons">
                         <div><a href="" class="social-icon"> <i class="fa fa-facebook"></i></a></div>
                         <div><a href="" class="social-icon"> <i class="fa fa-twitter"></i></a></div>
                         <div><a href="" class="social-icon"> <i class="fa fa-youtube"></i></a></div>
                         <div><a href="" class="social-icon"> <i class="fa fa-instagram"></i></a></div>
                         <div><a href="" class="social-icon"> <i class="fa fa-github"></i></a></div>
                     </div>
                 </div>
             </div>
             <div class="col-lg m-4" id="help">
                 <h5>Help Support</h5>
                 <p class="footer text-monospace">Whatsapp CS: 089636433890<br>Whatsapp Layanan Konsumen: 085643686161<br>email: layanan@m-barber.com</p>
             </div>
         </div>
     </div>
 </div>
 <div class="footer-copyright text-center py-3">© 2020 Copyright:
     <a href="http://dev.posbeck.online/"> POSbeck</a>
 </div>
 <!-- Modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <p>
                     Selamat datang di <b>m-barber.com</b>
                 </p>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <p class="text-justify text-monospace">Kami menyediakan kebutuhan cukur dalam genggaman ponsel anda. Anda tidak perlu repot datang ke barbershop, dengan ini kami akan mendatangkan barber premium ke rumah anda. #stayathome</p>
             </div>
             <div class="modal-footer">
                 <div class="mx-auto">
                     <i class="text-monospace">powered by</i>
                     <img src="<?= base_url('assets/img/artaB.png') ?>" class="artaLogo " alt="">
                 </div>

             </div>
         </div>
     </div>
 </div>

 <script src="<?= base_url('assets/js/jquery-3.5.1.js') ?>"></script>
 <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
 <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
 <script src="<?= base_url('assets/js/bootstrap-select.min.js') ?>"></script>
 <script src="<?= base_url('assets/js/bootstrap.bundle.js') ?>"></script>
 <script src="<?= base_url('assets/js/gijgo.js') ?>"></script>

 <script>
     var today, datepicker;
     today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate() + 1);
     $('#datepicker').datepicker({
         uiLibrary: 'bootstrap4',
         footer: true,
         modal: true,
         format: 'dd mmmm yyyy',
         minDate: today,
         maxDate: function() {
             var date = new Date();
             date.setDate(date.getDate() + 31);
             return new Date(date.getFullYear(), date.getMonth(), date.getDate());
         }
     });
 </script>
 <script>
     $(".formActtion").ready(function() {
         $(".preloader").fadeOut();
     })
 </script>
 <script>
     $(document).ready(function() {
         $('#exampleModalCenter').modal('show')
     })
 </script>

 <script>
     var cek = $('.selectpicker').val();
     console.log(cek);
 </script>

 <script>
     $('.btn-number').click(function(e) {
         e.preventDefault();
         fieldName = $(this).attr('data-field');
         type = $(this).attr('data-type');
         var input = $("input[name='" + fieldName + "']");
         var currentVal = parseInt(input.val());
         if (!isNaN(currentVal)) {
             if (type == 'minus') {

                 if (currentVal > input.attr('min')) {
                     input.val(currentVal - 1).change();
                 }
                 if (parseInt(input.val()) == input.attr('min')) {
                     $(this).attr('disabled', true);
                 }

             } else if (type == 'plus') {

                 if (currentVal < input.attr('max')) {
                     input.val(currentVal + 1).change();
                 }
                 if (parseInt(input.val()) == input.attr('max')) {
                     $(this).attr('disabled', true);
                 }

             }
         } else {
             input.val(0);
         }
     });
     $('.input-number').focusin(function() {
         $(this).data('oldValue', $(this).val());
     });
     $('.input-number').change(function() {

         minValue = parseInt($(this).attr('min'));
         maxValue = parseInt($(this).attr('max'));
         valueCurrent = parseInt($(this).val());

         name = $(this).attr('name');
         if (valueCurrent >= minValue) {
             $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
         } else {
             alert('Sorry, the minimum value was reached');
             $(this).val($(this).data('oldValue'));
         }
         if (valueCurrent <= maxValue) {
             $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
         } else {
             alert('Sorry, the maximum value was reached');
             $(this).val($(this).data('oldValue'));
         }


     });
     $(".input-number").keydown(function(e) {
         // Allow: backspace, delete, tab, escape, enter and .
         if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
             (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
             // let it happen, don't do anything
             return;
         }
         // Ensure that it is a number and stop the keypress
         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
             e.preventDefault();
         }
     });
 </script>
 </body>

 </html>
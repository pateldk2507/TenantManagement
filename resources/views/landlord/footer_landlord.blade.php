<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; PropertyAssistance 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="{{ route('landlord.logout') }}">Logout</a>
    </div>
</div>
</div>
</div>
{{-- <script>
    document.querySelector("#files").addEventListener("change", (e) => { //CHANGE EVENT FOR UPLOADING PHOTOS
if (window.File && window.FileReader && window.FileList && window.Blob) { //CHECK IF FILE API IS SUPPORTED
const files = e.target.files; //FILE LIST OBJECT CONTAINING UPLOADED FILES
const output = document.querySelector("#result");
output.innerHTML = "";
for (let i = 0; i < files.length; i++) { // LOOP THROUGH THE FILE LIST OBJECT
    if (!files[i].type.match("image")) continue; // ONLY PHOTOS (SKIP CURRENT ITERATION IF NOT A PHOTO)
    const picReader = new FileReader(); // RETRIEVE DATA URI 
    picReader.addEventListener("load", function (event) { // LOAD EVENT FOR DISPLAYING PHOTOS
      const picFile = event.target;
      const div = document.createElement("div");
      div.innerHTML = `<img class="thumbnail" src="${picFile.result}" title="${picFile.name}"/>`;
      output.appendChild(div);
    });
    picReader.readAsDataURL(files[i]); //READ THE IMAGE
}
} else {
alert("Your browser does not support File API");
}
});
</script> --}}
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
{{-- <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script> --}}

<!-- Page level custom scripts -->
{{-- <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script> --}}
{{-- <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script> --}}

<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->

</body>

</html>
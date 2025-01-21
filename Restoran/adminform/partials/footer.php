           <!-- Footer -->
           <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Taman Kelapa 2025</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">KELUAR?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "Logout" jika anda ingin keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>




     <!-- jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

         <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>

    <!-- jsPDF JS (untuk ekspor PDF) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <!-- pdfmake JS (untuk ekspor PDF) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <!-- JSZip JS (untuk ekspor Excel) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <!-- DataTables Buttons HTML5 JS (untuk ekspor ke format seperti PDF, Excel, dll) -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        
    // Inisialisasi DataTable dan menggunakan fitur Buttons dan jsPDF dan pdfmake untuk mendukung ekspor PDF Jzip untuk Excel
    //Table User
    $('#dataTable').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excel',
            exportOptions: {
                columns: ':visible:not(:last-child)' // Menghindari kolom terakhir (kolom Action)
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: ':visible:not(:last-child)' // Menghindari kolom terakhir (kolom Action)
            }
        }
    ]
});

    // Table Menu
    $('#dataTable1').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excel',
            exportOptions: {
                columns: ':visible:not(:last-child)' // Menghindari kolom terakhir (kolom Action)
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: ':visible:not(:last-child)' // Menghindari kolom terakhir (kolom Action)
            }
        }
    ]
});


//Table Booking
$('#dataTable2').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excel',
            exportOptions: {
                columns: ':visible:not(:last-child)' // Menghindari kolom terakhir (kolom Action)
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: ':visible:not(:last-child)' // Menghindari kolom terakhir (kolom Action)
            }
        }
    ]
});
        
    //Table Home
    $('#dataTable3').DataTable(); 

    // Table About
        $('#dataTable4').DataTable(); 
    
    // Table Service
        $('#dataTable5').DataTable(); 
    
    // Table Testimoni
        $('#dataTable6').DataTable(); 

    //Table Cntact
    $('#dataTable7').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excel',
            exportOptions: {
                columns: ':visible:not(:last-child)' // Menghindari kolom terakhir (kolom Action)
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: ':visible:not(:last-child)' // Menghindari kolom terakhir (kolom Action)
            }
        }
    ]
});
    });

</script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        // Mendapatkan URL saat ini
        const currentLocation = window.location.pathname;

        // Mendapatkan semua link navbar
        const navLinks = document.querySelectorAll('.nav-link');
        const navItem = document.querySelectorAll('.nav-item');

        // Menandai link yang sesuai dengan URL saat ini
        navLinks.forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('active');
            }
            
        });
    </script>
</body>

</html>
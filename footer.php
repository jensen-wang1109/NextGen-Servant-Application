<!-- Footer -->
<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright my-auto" style="color: black;">
                        <span>Copyright &copy; NextGen Community 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top" style="background-color: #2c3cfb;">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;"><b>Logout</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="color: black;">Klik tombol "Logout" jika ingin keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- print related -->
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    

    <!-- Datatables -->
    <script>
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = (day<10 ? '0' : '') + day  + '/' +
                    (month<10 ? '0' : '') + month + '/' +
                    + d.getFullYear();

        $(document).ready(function() {
            var table = $('#table').DataTable();
            $('#table').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
        
                if ( row.child.isShown() ) {
                    row.child.hide();
                    tr.removeClass('shown');
                    
                }
                else {
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
            
            var tableIbadah = $('#table_ibadah').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    // {
                    //     text: 'choose',
                    //     // className: 'btn btn-primary',
                    //     split: [{
                    //         extend: 'csv',
                    //         className: 'btn btn-primary'
                    //     },
                    //     {
                    //         extend: 'excel',
                    //         className: 'btn btn-primary'
                    //     }, 
                    //     {
                    //         extend: 'pdfHtml5',
                    //         orientation: 'landscape',
                    //         pageSize: 'LEGAL',
                    //         className: 'btn btn-primary',
                    //         customize: function(doc) {
                    //             doc.styles.tableBodyEven.alignment = 'left';
                    //             doc.styles.tableBodyOdd.alignment = 'left'; 
                    //         }
                    //     },
                    //     {
                    //         text: 'JSON',
                    //         className: 'btn btn-primary',
                    //         action: function ( e, dt, button, config ) {
                    //             var data = dt.buttons.exportData();
            
                    //             $.fn.dataTable.fileSave(
                    //                 new Blob( [ JSON.stringify( data ) ] ),
                    //                 $('title').text() + '.json'
                    //             );
                    //         }
                    //     }]
                    // },
                    // {
                    //     extend: 'csv',
                    //     className: 'btn btn-primary'
                    // }, 
                    {
                        extend: 'excel',
                        className: 'btn btn-primary',
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            var col = $('col', sheet);
                            //set the column width otherwise it will be the length of the line without the newlines
                            $(col[1]).attr('width', 50);
                            $(col[2]).attr('width', 50);
                            $(col[3]).attr('width', 50);
                            $(col[4]).attr('width', 50);
                            $(col[5]).attr('width', 50);
                            $('row c[r^="A"]', sheet).each(function() {
                                if ($('is t', this).text()) {
                                    //wrap text
                                    $(this).attr('s', '55');
                                }
                            })
                            $('row c[r^="B"]', sheet).each(function() {
                                if ($('is t', this).text()) {
                                    //wrap text
                                    $(this).attr('s', '55');
                                }
                            })
                            $('row c[r^="C"]', sheet).each(function() {
                                if ($('is t', this).text()) {
                                    //wrap text
                                    $(this).attr('s', '55');
                                }
                            })
                            $('row c[r^="D"]', sheet).each(function() {
                                if ($('is t', this).text()) {
                                    //wrap text
                                    $(this).attr('s', '55');
                                }
                            })
                            $('row c[r^="E"]', sheet).each(function() {
                                if ($('is t', this).text()) {
                                    //wrap text
                                    $(this).attr('s', '55');
                                }
                            })
                        }
                    }, 
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: []
                        },
                        messageTop: '\n\n' +
                        'Tema Bulanan: ' + $('#tema_bulanan').text() + '\n\n' + 
                        'Tema Mingguan: ' + $('#tema_mingguan').text() + '\n\n' +
                        'Pengkhotbah: ' + $('#pengkhotbah').text() + '\n\n\n' +
                        'Pemusik: ' + $('#list_pemusik').text() + '\n\n' + 
                        'Usher: ' + $('#list_usher').text(),

                        title: 'NEXTGEN' + '\n' + $('title').text(),
                        // orientation: 'landscape',
                        pageSize: 'LEGAL',
                        className: 'btn btn-primary',
                        customize: function(doc) {
                            doc.styles.tableBodyEven.alignment = 'left';
                            doc.styles.tableBodyOdd.alignment = 'left';
                            // doc.styles.tableHeader = {
                            //     color: '#000',
                            // };
                            // doc.content[1].table.body[1].forEach(function(b) {
                            //     b.fillColor = 'white';
                            // });
                        },
                        messageBottom: '\n\n' + 'Dicetak oleh: ' + $('#fullname_user').text() + '\n' + 'Tanggal dicetak: ' + output
                    }
                    // ,
                    // {
                    //     text: 'JSON',
                    //     className: 'btn btn-primary',
                    //     action: function ( e, dt, button, config ) {
                    //         var data = dt.buttons.exportData();
        
                    //         $.fn.dataTable.fileSave(
                    //             new Blob( [ JSON.stringify( data ) ] ),
                    //             $('title').text() + '.json'
                    //         );
                    //     }
                    // }
                ]
            });
            
        });

    </script>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
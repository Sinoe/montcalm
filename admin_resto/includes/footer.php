        
        </div><!-- END ROW -->
    </div><!-- END CONTAINER -->
</main><!-- END MAI? -->
<footer class="page-footer">
    <div class="container admin">© 2020 Montcalm, All rights reserved. </div>
</footer>
<a href="#" id="go-to-top"><i class="material-icons">
arrow_upward
</i></a>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script type="text/javascript" src="assets/js/libs/FileSaver/FileSaver.min.js"></script>
        <script type="text/javascript" src="assets/js/libs/js-xlsx/xlsx.core.min.js"></script>
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

        <script src="assets/js/tableExport.min.js"></script>

        <!-- <script src="assets/js/main.js"></script> -->
<!--         <sript src="//cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"></script>
 -->        <script>
            $(document).ready(function(){
                if($('#tabs-all #plats').length){
                    $('#plats').DataTable({
                        paging: false,
                        "autoWidth" : false,
                        "language": {
                            "sProcessing":     "Traitement en cours...",
                            "sSearch":         "Rechercher&nbsp;:",
                            "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                            "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                            "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                            "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                            "sInfoPostFix":    "",
                            "sLoadingRecords": "Chargement en cours...",
                            "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                            "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                            "oPaginate": {
                                "sFirst":      "Premier",
                                "sPrevious":   "Pr&eacute;c&eacute;dent",
                                "sNext":       "Suivant",
                                "sLast":       "Dernier"
                            },
                            "oAria": {
                                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                                "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                            },
                            "select": {
                                    "rows": {
                                        _: "%d lignes séléctionnées",
                                        0: "Aucune ligne séléctionnée",
                                        1: "1 ligne séléctionnée"
                                    } 
                            }
                        }
                    });
                }
                if($('#tabs-all #commandes').length){
                    $(' #commandes').DataTable({
                        paging: false,
                        "autoWidth" : false,
                        "language": {
                            "sProcessing":     "Traitement en cours...",
                            "sSearch":         "Rechercher&nbsp;:",
                            "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                            "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                            "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                            "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                            "sInfoPostFix":    "",
                            "sLoadingRecords": "Chargement en cours...",
                            "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                            "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                            "oPaginate": {
                                "sFirst":      "Premier",
                                "sPrevious":   "Pr&eacute;c&eacute;dent",
                                "sNext":       "Suivant",
                                "sLast":       "Dernier"
                            },
                            "oAria": {
                                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                                "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                            },
                            "select": {
                                    "rows": {
                                        _: "%d lignes séléctionnées",
                                        0: "Aucune ligne séléctionnée",
                                        1: "1 ligne séléctionnée"
                                    } 
                            }
                        },
                        "order": [
                            [0, 'desc']
                        ]
                    });
                }
            });

        </script>
    </body>
</html>
        <!-- JQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Editor Trumbowyg -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.26.0/trumbowyg.min.js" integrity="sha512-ZfWLe+ZoWpbVvORQllwYHfi9jNHUMvXR4QhjL1I6IRPXkab2Rquag6R0Sc1SWUYTj20yPEVqmvCVkxLsDC3CRQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.26.0/langs/pt_br.min.js" integrity="sha512-iJ7snbcZfiZbui/K17AYkBONvjRS1F3V/Y/Ph7n84hptyJUDeXO6rCUX05N5yeY53EUyDotiLn+nK4GXoKXyug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Datatable -->
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.trumbowyg').trumbowyg({
                    lang: 'pt_br'
                });

                $('#tabela').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
                    },
                    order: [[0, 'desc']]
                });
            });
        </script>
    </body>
</html>
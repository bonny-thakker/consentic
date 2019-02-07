<script>
    $(document).ready(function() {
        $('section.section').each(function() {
            let section = $(this);
            let styles = $(this).data();

            $.each(styles, function(name, value) {
                switch (name) {
                    case 'backgroundImage':
                        section.css(name, `url("${value}")`);
                        break;

                    default:
                        section.css(name, value);
                        break;
                }
            });
        });
    });
</script>
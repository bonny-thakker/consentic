@extends('layouts.web')

@section('title', 'Home')

@section('styles')
    <style>
        header.app-header,
        nav.navbar {
            /* background-color: #E5E9F2 !important; */
            background-color: transparent !important;
        }

        a.navbar-item.is-active, a.navbar-item:hover, a.navbar-link.is-active, a.navbar-link:hover {
            color: #fff !important;
        }

        .navbar-item, .navbar-link {
            color: #ccc;
        }

        @media screen and (max-width: 1023px) {
            header.app-header, nav.navbar {
                background-color: white !important;
            }

            a.navbar-item.is-active, a.navbar-item:hover, a.navbar-link.is-active, a.navbar-link:hover {
                color: #000 !important;
            }

            .navbar-item, .navbar-link {
                color: #666 !important;
            }
        }

        section.section:first-of-type img {
            max-width: 400px !important;
            margin: auto;
        }

        section.section:first-of-type {
            /* Set a specific height */
            min-height: 500px;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

            margin-top: -104px !important;
            padding-top: 150px !important;
        }

        section.section:first-of-type .title,
        section.section:first-of-type .subtitle {
            color: #fff !important;
            max-width: initial;
            text-align: left;
            line-height: 2.2rem;
            font-size: 1.2rem;
        }

        section.section:first-of-type .title {
            font-size: 2.3rem;
            line-height: 3rem;
        }

        section.section:not(:first-of-type) {
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
        }

        main.app-content {
            margin-top: 0px;
        }

        header.app-header {
            position: initial;
            top: initial;
            z-index: 1;
            width: 100%;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
        }

        header.app-header.sticky {
            position: fixed;
            top: 0;
            z-index: 1;
            width: 100%;
            background: #fff !important;
            -webkit-box-shadow: 0px 2px 8px 1px rgba(0,0,0,0.25);
            -moz-box-shadow: 0px 2px 8px 1px rgba(0,0,0,0.25);
            box-shadow: 0px 2px 8px 1px rgba(0,0,0,0.25);
            color: #666;
        }

        header.app-header.sticky .navbar-item, .navbar-link {
            color: #666;
        }

        header.app-header.sticky a.navbar-item.is-active, a.navbar-item:hover, a.navbar-link.is-active, a.navbar-link:hover {
            color: #16b1ba!important
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('section.section').each(function() {
                let section = $(this);
                let styles = $(this).data();

                $.each(styles, function(name, value) {

                    if (value == '' || value == null || value == undefined) {
                        return;
                    }

                    switch (name) {
                        case 'backgroundImage':
                            section.css('background-image', `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("${value}")`);
                            break;

                        default:
                            section.css(name, value);
                            break;
                    }
                });
            });

            $('#main-signup-button').click(function() {
                let emailAddress = $('#main-email-input').val();

                if (emailAddress) {
                    location.replace(`/registration?email=${emailAddress}`);
                }
            });

            // When the user scrolls the page, execute myFunction
            window.onscroll = function() {myFunction()};

            // Get the header
            var header = document.getElementById("app-header");

            // Get the offset position of the navbar
            var sticky = header.offsetTop;

            // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("sticky");
                    $('#brand-logo').attr('src', '/images/logo-dark-sm.png');
                } else {
                    header.classList.remove("sticky");
                    $('#brand-logo').attr('src', '/images/logo-light-sm.png');
                }
            }
        });
    </script>
@endsection

@section('content')

    // TBC

@endsection
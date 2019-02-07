@extends('layouts.web')

@section('title', 'Features')

@section('styles')

@include('web.partial.styles')

<style>
    .section-title {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("/images/88f317b253ecd8ac834beaa7d62ab646_landing.jpg");
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

@endsection

@section('scripts')
    @include('web.partial.scripts')
@endsection

@section('content')

    <main class="app-content">

        <section class="section section-title is-highlight">
            <div class="container">
                <h2 class="title">Features</h2>
                <h3 class="subtitle">Simplicity, interactivity and safety are the key elements of the Consentic model.</h3>
            </div>
        </section>
        <section class="section ui-sortable-handle" data-background-image="" data-background-color="" style="background-image: url(&quot;&quot;);" ");"="">
        <div class="container">
            <div class="columns rows ui-sortable"><div class="column">
                    <div class="column-actions" style="display: none;">
                        <button class="button page-action is-circle is-primary is-outlined tooltip" data-tooltip="Edit Content" data-action="edit" data-toggle="modal" data-modal-id="#edit-content">
                            <span class="icon is-small">
                                <i class="fa fa-edit"></i>
                            </span>
                        </button>
                        <button class="button page-action is-circle is-primary is-outlined tooltip" data-tooltip="Remove Column" data-action="remove">
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                        </button>
                    </div>
                    <div class="column-content"><p style="text-align: center;"><img data-filename="light-min.png" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAh1BMVEX///+7u7vS0tLd3d3V1dUeHh77+/sAAADm5ubi4uLj4+PMzMz39/fs7Ow9PT3ExMSxsbGAgICbm5uVlZWOjo5SUlLw8PDY2NhKSkqHh4dlZWWnp6dCQkJ5eXmmpqYYGBgkJCQ4ODidnZ0NDQ0pKSlcXFx0dHQzMzMuLi5sbGxra2sbGxtJSUnenDNMAAAHaklEQVR42u1d6XqqOhQFVIIigio4iyra6jnv/3z36+1pCRZIAtk7wWb9FmAlZI+DlmVgYPCb4I68T4zcF2W4JF8YvijD3jfDkWFoGBqGhqFhaBgahoahYWgYGoaGoWFoGBqGhqFhqBDDbPKJzLMMDAwMfiLR7o0kZwaWJNKM4DwdyyVIyFYrggtCMokU+/+r6bNGBNcfL3Qcy9zBD8y0ITj9fKGBpLPofBtbC00I3r9e6E8il6AuFDf5Cw0SufcjZKoBwSv9QmsZd3zQd9wrJxgDrPiNvue96V3G3tC3P+H3vMZicEUgTs2evutG3PpwounuQoq4xOvIEZeFO/oeEoX7mr7vVeTKwN6/kWpMpqHIbroT+uKDZBMiR8zt8s7q2H2zPPA6xOOMvk6yHTkXpuhud4QXu4jnex0fAQla1qGw7OyYzJ6I4cassUkKv7flS+ltgWL96fFjIo7Yqb2nV5BVIYQiiugn+HWG+oQ0w87nXWEfRtfa+RNqljvYkOa4DrkoOlDmRMixhPM6AtlkFa92Wd1P1hwUe3AWU8hawv6g9LUv10XkBPRGO+H8cSznGLIogtb9+fU7uC5747sdVH3QYanEvdVTBA4n92t2MCjR71PWkVkuSrayX03xEkCb9k7IPKW5TuFTWs79x5WVBtkWnCCnYfeBB79AGP+QTw/topfWs464ix0Xd/Z0/WmsGcEnJX8Vz5+5T2IqDXTi5xZlTNrM5PCebD2NsozuO5ETWrCLFHuaEmxjFCexlhQLfuCupYQoimQ9zuJGbnTPL5xoHSRqYdFlpG9GFyFfGxy2fLetEK24qyY44jInRSlmkj+LNkgBCD5JZ7VNUlOgyIJLrdxRJUEfLPgVaJIOgomwfzmi8GEZJtZtshksUIGnd1UEh7BnhfKLVZUQxMDyjpI2akybECgLlIdwVAubU25tw+uiQO0WgsX31GbXd3KrBVhGL35hHVWE4mKcBPxClwewmPlhNGETzNOVF9DnTCBTorU4I3k3uTxbITN8w/p6UkUKo4cmAQ6KTLc52sqOFYVsMuHamsbYKFGJCVxVS43Wx5SmNqLR7yqx3KaYIjxW4QhPMOXbWcFBzOXbEuFpfeg6odrwhYu6nngaMYR2fSvspxsawwhXut3wdf4aKkhajhm+B3XD0/fY2vdZQ+EItz58QKgytrBEedwQP68/wE18JfgJDGynFLb2ufaJCfLz7JdnGL38V4q2hxlyih2f4V9cbeG2dy7cYSk8ZugER3p7TH3olRPIPZ9RedH8qeqRe9yT32fWY57KCYxKFqmAFdMUxrG8baY7uion4DVmaON6T2zfQjrDPq7D9mA63NIZjlGjGNY7M5svnSGuQkzYaS75DDeYwtRnuxbyGR4wY0MLtovPZFihD6sjaUvMyEnGlms7lj5sYSnC222BmmKFDd5TDwpC3hYVMT2CP2qiphojASh9ZoWhNqgM8xEq0G10a1XlJmhRWoJrP5V5pQskOYNeuzfFWVtCcOMJFPKKmjnKFipoD1ohnESXKCtrKxjEcCXKuSD9YynACfyI9Ah+LJhGXjb4Bm7OpJYSxMAaY07wUzKVHxHEd7rk8eOAkc/tuMiXp+5FgwY9lyce0P4MADYDCFin0lUG1U2SWgqxgWrPo0eLLVUydIFaLOn+6bmlFD5II6TfZMIfFGYAExB6dMBM/cwB6ihKMh7pHmAt/u7y1HAsZuXZPhLlxkwR44tcqbDSaNzAP3hSpw7M9RGjOajO8kvbmIaj1dDiMvXVNrrYap4vIBayhkdMNXAoynGV04/oaDZ8p9x8a+MJHPVShFWr3zxtN4Nu8Zd0ghpbkolG1mgZ0tbCZqqyOV3IITi1tke3lpa4tnQVp22XCBxBuwBqoolXz7cJTVyChVwXBcbLaGWPaDgR8ifWLb4zuwNbSB8l8VF5O7Tih1a4NQ6vBDqNSqzBsrFGm6lNpDUI2ojuxJuawiBxRA3tb09Hx54ha8Si/AcNBuxxYtNsPkCMM9BH7mcqFAEnmDW5suwaEZnoqKwqaay5RUJlc1XVa00wb3KiYuiyDpiAjUAsKdUgoQ16EIMuHUPKrOHX3SF+x70UP5jfcDt0SdDQ43G5L9nrHqCpEjXcn1yszQR2QbHBbWKm2iUMOS2wCO4KtUhF3YtETVtMc8SilWCe/oHSCgeK1zLt6fjnOXW4iSaQ+nonZGpU/l/OC/yuxGi+sBA1ajrHcCYayAi7xvAs2pxoGBqG6hhmrypp8oGjAz6k3WUojK5pC8PQMDQMDUPDsDHmv4hhtOzzoNddhryVMd1l6BiGhqFhaBgahoZhBRaGYecZnoWTZV1jGIkmPAMtpicIIBTtkYy6UMNeuiW89YkndX9U2RBHscaCQ9eS3IWeWY46Nb9zDnCxff3GqnI6azGHRhQbOjKxrik/GB0GhHQtx/28ifxYWB1Ck3Db0eoU/ooz7HWLofsuSjC0Ogb39OIELbqPjY3B0OoiQm6Ca6ur2B55+O09q8NYzuJadtnUdq3OIwm8CgSWgYHBb8B/HKLR60ag6N4AAAAASUVORK5CYII=" style="width: 50%;"></p>
                        <h3 class="title m-t-lg m-b-lg" style="text-align: center;">Simple</h3>
                        <p class="subtitle" style="text-align: center;">Our consent videos describe procedures simply and effectively and using everyday language, and have been tested on real patients. By doing this we are able to ensure that patients understand the information provided, and therefore feel more confident and reassured going into their procedure. </p></div>
                </div><div class="column">
                    <div class="column-actions" style="display: none;">
                        <button class="button page-action is-circle is-primary is-outlined tooltip" data-tooltip="Edit Content" data-action="edit" data-toggle="modal" data-modal-id="#edit-content">
                            <span class="icon is-small">
                                <i class="fa fa-edit"></i>
                            </span>
                        </button>
                        <button class="button page-action is-circle is-primary is-outlined tooltip" data-tooltip="Remove Column" data-action="remove">
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                        </button>
                    </div>
                    <div class="column-content"><p style="text-align: center;"><img data-filename="interactive5-min.png" src="data:image/png;base64,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" style="width: 50%;"></p>
                        <h3 class="title m-t-lg m-b-lg" style="text-align: center;">Interactive</h3>
                        <p class="subtitle" style="text-align: center;">Our platform allows patients to interact with the videos . At any time patients can pause, rewind and repeat any section of the video. By doing this, patients are able to understand material more quickly and comprehensively and retention of information is improved.</p></div>
                </div><div class="column">
                    <div class="column-actions" style="display: none;">
                        <button class="button page-action is-circle is-primary is-outlined tooltip" data-tooltip="Edit Content" data-action="edit" data-toggle="modal" data-modal-id="#edit-content">
                            <span class="icon is-small">
                                <i class="fa fa-edit"></i>
                            </span>
                        </button>
                        <button class="button page-action is-circle is-primary is-outlined tooltip" data-tooltip="Remove Column" data-action="remove">
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                        </button>
                    </div>
                    <div class="column-content"><p style="text-align: center;"><img src="data:image/png;base64,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" data-filename="tick2-min.png" style="width: 50%;"></p>
                        <h3 class="title m-t-lg m-b-lg" style="text-align: center;">Safe</h3>
                        <p class="subtitle" style="text-align: center;">Once a patient has watched the animation, they are prompted to complete questions about the procedure that highlight specific risks, before they sign an electronic consent form. The consent form is securely stored, protecting you now and into the future.</p></div>
                </div></div>
            <div class="row-actions" style="display: none;">
                <button class="button page-action is-circle is-black is-outlined tooltip" data-tooltip="Settings" data-action="settings" data-toggle="modal" data-modal-id="#edit-property">
                                <span class="icon is-small">
                                    <i class="fa fa-cog"></i>
                                </span>
                </button>
                <button class="button page-action is-circle is-black is-outlined tooltip" data-tooltip="Remove Row" data-action="remove">
                                <span class="icon is-small">
                                    <i class="fa fa-trash"></i>
                                </span>
                </button>
            </div>
        </div>
        </section>

    </main>

@endsection
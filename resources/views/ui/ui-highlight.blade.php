@extends('layouts.master')

@section('css')
<link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('breadcrumb')
<h3 class="page-title">Highlight</h1>
@endsection

@section('content')
<div class="page-content-wrapper">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">HTML Highlight</h4>
                    <p class="text-muted m-b-30 font-14">Prism is a lightweight, extensible syntax highlighter, built with modern web standards in mind.</p>
                    <pre class=" language-markup"><code class=" language-markup">
&lt;html&gt;
&lt;!-- this is a comment --&gt;
&lt;head&gt;
&lt;title&gt;HTML Example&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
The indentation tries to be &lt;em&gt;somewhat &amp;quot;do what
I mean&amp;quot;&lt;/em&gt;... but might not match your style.
&lt;/body&gt;
&lt;/html&gt;
                    </code></pre>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Css Highlight</h4>
                    <p class="text-muted m-b-30 font-14">Prism is a lightweight, extensible syntax highlighter, built with modern web standards in mind.</p>

<pre class="line-numbers">
<code class="language-css">
.example {
font-family: Georgia, Times, serif;
color: #555;
text-align: center;
}
</code>
</pre>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div><!-- container -->
</div> <!-- Page content Wrapper -->

@endsection

@section('script')
  <!-- Prism js -->
  <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

@endsection


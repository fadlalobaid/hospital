<x-front-layout title="Department">
    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>depertments</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- our depertment part start-->
    <section class="our_depertment section_padding single_pepertment_page">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-12">
                    <div class="depertment_content">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <h2>Our Depertment</h2>
                                <div class="row">
                                    @foreach ($departments as $deprtment)
                                    <div class="col-lg-6 col-sm-6">
                                        <x-card.department :deprtment="$deprtment" />
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>

<div class="col-lg-12 col-md-6 col-12">
    <div class="card earnings-card">
        <div class="card-header">
                  <div class="col-12 revenue-report-wrapper">
                              <div class="d-sm-flex justify-content-between align-items-center mb-3">
                        <h6 class="heading-card">Topics</h6>
                        <div class="d-flex align-items-center">

                            <div class="d-flex align-items-center me-2 ">
                                <span class="bullet bullet-warning font-small-3 me-50 cursor-pointer" style="
    background-color: rgb(255 76 48);
"></span>
                                <span class="apexcharts-legend-text">Positive</span>
                            </div>
                            <div class="d-flex align-items-center ms-75">
                                <span class="bullet bullet-primary font-small-3 me-50 cursor-pointer" style="
    background-color: rgb(147 250 165);"></span>
                                <span class="apexcharts-legend-text">Negative</span>
                            </div>

                        </div>
                        <div class="d-flex">
                            <div class="mb-1">
                                <select class="select2 form-select select2-hidden-accessible" name="filter[category]" id="category">
                                    <option value="all">Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->c_id }}">{{ $category->c_name }}</option>
                                    @endforeach
                                </select>
                            </div>
 </div>
                        </div>
                    </div>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-12 revenue-report-wrapper">


                    <div id="revenue-report-chart2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        var colors = @json($colors);
        var $negativeChunks = `rgb${colors.negative}`;
        var $positiveChunks = `rgb${colors.positive}`;

        var revenueReportChartOptions;
        var $revenueReportChart = document.querySelector('#revenue-report-chart2');
        // Revenue Report Chart
        // ----------------------------------
        revenueReportChartOptions = {
            chart: {
                height: 330,
                stacked: true,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '20%',
                    endingShape: 'rounded'
                },
                distributed: true
            },
            colors: [$negativeChunks, $positiveChunks],
            series: [{
                    name: 'Negative',
                    data: [...@json($topicNegative)]
                },
                {
                    name: 'Positive',
                    data: [...@json($topicPositive)]
                }




            ],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            grid: {
                padding: {
                    top: -20,
                    bottom: -10
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            xaxis: {
                // topics
                categories: [
                    @foreach ($topics as $key => $topic)
                        '{{ $topic->t_name }}',
                    @endforeach
                ],
                labels: {
                    style: {
                        fontSize: '0.86rem'
                    }
                },
                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    style: {

                        fontSize: '0.86rem'
                    },
                    formatter: function(val) {
                        return new Intl.NumberFormat().format(parseInt(Math.abs(val)));
                    }
                }
            }
        };
        revenueReportChart = new ApexCharts($revenueReportChart, revenueReportChartOptions);
        revenueReportChart.render();

        // Category
        // ----------------------------------
        $('#category').on('change', function() {
            var $category = document.querySelector('#category');
            var routeName = "{{ route('charts.topics.category') }}";
            $.ajax({
                url: routeName,
                type: "GET",
                dataType: "json",
                data: {
                    "filter[category]": `${$category.value}`

                },
                success: function(data) {

                    let names = [];
                    for (topic in data.topics) {
                        names.push(data.topics[topic].t_name)
                    }

                    revenueReportChart.updateSeries([{
                            name: 'Negative',
                            data: [...data.topicNegative]
                        },
                        {
                            name: 'Positive',
                            data: [...data.topicPositive]
                        }

                    ]);
                    revenueReportChart.updateOptions({
                        xaxis: {
                            categories: [...names]
                        }
                    })



                }
            });
        });
    </script>
@endpush
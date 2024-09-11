<div class="info-text">
    <h3>{{$json->title}}</h3>
    <div class="ant-row">
        <div class="ant-col ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
            <div class="mb-24">
                <label>{{$json->input->label}}</label>
                <div class="p-textarea">
                    {!! $json->input->value !!}
                </div>
            </div>
        </div>
        <div class="ant-col ant-col-xs-24 ant-col-sm-24 ant-col-md-12">
            <div class="mb-24">
                <label>{{$json->output->label}}</label>
                <div class="p-textarea">
                    {!! $json->output->value !!}
                </div>
            </div>
        </div>
    </div>
</div>
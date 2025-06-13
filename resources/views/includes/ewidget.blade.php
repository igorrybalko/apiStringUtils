<div class="info-text">
    <h3>{{$json->title}}</h3>
    <div class="lg:flex gap-x-2">
        <div class="lg:w-1/2">
            <div class="mb-6">
                <label>{{$json->input->label}}</label>
                <div class="p-textarea">
                    {!! $json->input->value !!}
                </div>
            </div>
        </div>
        <div class="lg:w-1/2">
            <div class="mb-6">
                <label>{{$json->output->label}}</label>
                <div class="p-textarea">
                    {!! $json->output->value !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="lg:w-1/4">
    <div class="mb-6">
        <h3>Similar tools</h3>

        <nav>
            <el-menu>
            @foreach ($similar as $item)
                <el-menu-item>
                    <a href="{{ $item->url }}">{{$item->title}}</a>
                </el-menu-item>
            @endforeach
            </el-menu>
        </nav>
    
    </div>
</div>
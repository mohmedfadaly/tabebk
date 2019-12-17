
                    <div class="single_department">
                        <div class="department_thumb">
                        <a href="{{ route('frontend.video' , ['id' => $Video->id]) }}" title="{{ $Video->name }}">
        <img src="{{ url('uploads/videos/'.$Video->image) }}" alt="{{ $Video->name }}" style="max-height: 160px">
    </a>
                        </div>
                        <div class="department_content">
                            <h3>
                {{ $Video->name }}
            </h3>
                            <p><small>{{ $Video->created_at }}</small></p>
                        </div>
                    </div>

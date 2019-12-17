<div class="owl-item active" style="width: 255px; margin-right: 30px;"><div class="single_expert">
                            <div class="expert_thumb">
                            <a href="{{ route('frontend.Doctor' , ['id' => $User->id]) }}" title="{{ $User->name }}">
                                <img src="{{ url('uploads/'.$User->filename) }}" alt="{{ $User->name }} " width="250">
                            </a>
                            </div>

                            <div class="experts_name text-center">
                                <h3><a href="#" title="{{ $User->name }}">
                                    {{ $User->name }}
                                </a></h3>
                                <span>{{ $User->Specialty->name }}</span>
                            </div>
                        </div></div>
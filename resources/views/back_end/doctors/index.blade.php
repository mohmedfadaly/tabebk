@extends('back_end.layout.app')
@section('title')
بيانات الطبيب
@endsection
@section('content')
              <div class="card">
                <div class="card-header card-header-primary">
                @component('back_end.layout.header')
                    @endcomponent
                
                <div class="row">
                  <div class="col-md-8 text-right">
                      <h4 class="card-title ">بيانات الطبيب</h4>
                  </div>
                  <div class="col-md-4 text-left">
                      <a href="{{ route('doctors.create') }}" class="btn btn-white btn-round"><i class="fas fa-user-plus"></i>اضافة</a>
                  </div>
                </div>

 
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" thead-dark">
                        <tr><th>
                          ID
                        </th>
                        <th>
                          الاسم
                        </th>
                        <th>
                        التخصص
                        </th>

                        <th>
                          البريد
                        </th>
                        <th class="text-left">
                          التحكم
                        </th>
                      </tr></thead>
                      <tbody>
                    @foreach($doctors as $Doctor)
                        <tr>
                            <td>
                                {{ $Doctor->id }}
                            </td>
                            <td>
                                {{ $Doctor->name }}
                            </td>

                            <td>
                                {{ $Doctor->Specialty->name }}
                            </td>

                            <td>
                                {{ $Doctor->email }}
                            </td>
                            <td class="td-actions text-left">
                              <a href="{{ route('doctors.edit' , ['id' => $Doctor]) }}" rel="tooltip" title="" class="btn-customized-2" data-original-title="Edit">
                              <i class="far fa-edit"></i> تعديل
                              </a>

                              <form action="{{route('doctors.destroy', ['id' => $Doctor->id])}}" method="POST"style="display: inline;">
                        
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" rel="tooltip" title="" class="btn btn-customized-2" data-original-title="delete">
                                  <i class="fas fa-trash-alt"></i> مسح
                                  </button>

                              </form>
                            </td>
                        </tr>
                     @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

@endsection
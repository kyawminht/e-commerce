@extends('layouts.admin')

@section('title','Admin setting')
@section('content')
    <div class="container mt-4">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <form action="{{ url('admin/setting') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Website Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                {{-- Website Name --}}
                                <div class="col-md-6">
                                    <label for="website_name" class="form-label">Website Name</label>
                                    <input type="text" class="form-control" value="{{$setting->website_name ? "$setting->website_name": ''}}" id="website_name" name="website_name" >
                                </div>
                                {{-- Website URL --}}
                                <div class="col-md-6">
                                    <label for="website_url" class="form-label">Website URL</label>
                                    <input type="url" class="form-control" value="{{$setting->website_url ? "$setting->website_url": ''}}" id="website_url" name="website_url" >
                                </div>
                            </div>

                            {{-- Page Title --}}
                            <div class="mb-3">
                                <label for="page_title" class="form-label">Page Title</label>
                                <input type="text" class="form-control" id="page_title" name="page_title" value="{{$setting->page_title ? "$setting->page_title": ''}}" >
                            </div>

                            {{-- Meta Keywords --}}
                            <div class="mb-3">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" value="{{$setting->meta_keyword ? "$setting->meta_keyword": ''}}" id="meta_keywords" name="meta_keyword">
                            </div>

                            {{-- Meta Description --}}
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control" value="{{$setting->meta_description ? "$setting->meta_description": ''}}" id="meta_description" name="meta_description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Contact Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                {{-- Address --}}
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" value="{{$setting->address ? "$setting->address": ''}}" class="form-control" id="address" name="address">
                                </div>
                                {{-- Phone Number 1 --}}
                                <div class="col-md-6">
                                    <label for="phone1" class="form-label">Phone Number 1</label>
                                    <input type="tel" value="{{$setting->phone1 ? "$setting->phone1": ''}}" class="form-control" id="phone1" name="phone1">
                                </div>
                            </div>

                            <div class="row mb-3">
                                {{-- Phone Number 2 --}}
                                <div class="col-md-6">
                                    <label for="phone2" class="form-label">Phone Number 2</label>
                                    <input type="tel" value="{{$setting->phone2 ? "$setting->phone2": ''}}" class="form-control" id="phone2" name="phone2">
                                </div>
                                {{-- Email 1 --}}
                                <div class="col-md-6">
                                    <label for="email1" class="form-label">Email Address 1</label>
                                    <input type="email" value="{{$setting->email1 ? "$setting->email1": ''}}" class="form-control" id="email1" name="email1">
                                </div>
                            </div>

                            <div class="row mb-3">
                                {{-- Email 2 --}}
                                <div class="col-md-6">
                                    <label for="email2" class="form-label">Email Address 2</label>
                                    <input type="email" value="{{$setting->email2 ? "$setting->email2": ''}}" class="form-control" id="email2" name="email2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Social Media Links</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                {{-- Facebook --}}
                                <div class="col-md-6">
                                    <label for="facebook" class="form-label">Facebook (optional)</label>
                                    <input type="url" value="{{$setting->facebook ? "$setting->facebook": ''}}" class="form-control" id="facebook" name="facebook">
                                </div>
                                {{-- Instagram --}}
                                <div class="col-md-6">
                                    <label for="instagram" class="form-label">Instagram (optional)</label>
                                    <input type="url" value="{{$setting->instagram ? "$setting->instagram": ''}}" class="form-control" id="instagram" name="instagram">
                                </div>
                            </div>

                            <div class="row mb-3">
                                {{-- Youtube --}}
                                <div class="col-md-6">
                                    <label for="youtube" class="form-label">Youtube (optional)</label>
                                    <input type="url" value="{{$setting->youtube ? "$setting->youtube": ''}}" class="form-control" id="youtube" name="youtube">
                                </div>
                                {{-- Twitter --}}
                                <div class="col-md-6">
                                    <label for="twitter" class="form-label">Twitter (optional)</label>
                                    <input type="url" value="{{$setting->twitter ? "$setting->twitter": ''}}" class="form-control" id="twitter" name="twitter">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </div>
            </div>
        </form>
    </div>

@endsection

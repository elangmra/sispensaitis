@extends('backend.layout.main')
@section('content')
<!-- ===== Content Area Start ===== -->
<div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
    @include('backend.layout.partials.header')

    <!-- ===== Main Content Start ===== -->
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mx-auto max-w-270">
                <!-- Breadcrumb Start -->
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-title-md2 font-bold text-black dark:text-white">
                        Settings Page
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li class="font-medium text-primary">Settings</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->

                <!-- ====== Settings Section Start -->
                <div class="grid grid-cols-5 gap-8">
                    <div class="col-span-5 xl:col-span-3">
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                            <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                                <h3 class="font-medium text-black dark:text-white">
                                    Personal Information
                                </h3>
                            </div>
                            <div class="p-7">
                                <form action="{{ route('admin.update_profile') }}" method="POST">
                                    @csrf
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="name">Name</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="name" id="name" placeholder="{{ Auth::user()->name }}"
                                            value="{{ Auth::user()->name }}" />
                                    </div>
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white"
                                            for="password">Password</label>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="password" name="password" id="password" placeholder="Masukkan Password Baru"
                                             />
                                    </div>



                                    <div class="flex justify-end gap-4.5">
                                        <button
                                            class="flex justify-center rounded border border-stroke px-6 py-2 font-medium text-black hover:shadow-1 dark:border-strokedark dark:text-white"
                                            type="submit">
                                            Cancel
                                        </button>
                                        <button
                                            class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90"
                                            type="submit">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-5 xl:col-span-2">
                        <div
                            class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                            <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                                <h3 class="font-medium text-black dark:text-white">
                                    Your Photo
                                </h3>
                            </div>
                            <div class="p-7">
                                <form action="{{ route('admin.update_profile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4 flex items-center gap-3">
                                        <div class="h-14 w-14 rounded-full">
                                            <img src="{{ asset('admin/images/user/user-03.png') }}" alt="User" />
                                        </div>
                                        <div>
                                            <span class="mb-1.5 font-medium text-black dark:text-white">Edit your
                                                photo</span>
                                            <span class="flex gap-2.5">
                                                <button class="text-sm font-medium hover:text-primary">
                                                    Delete
                                                </button>
                                                <button class="text-sm font-medium hover:text-primary">
                                                    Update
                                                </button>
                                            </span>
                                        </div>
                                    </div>

                                    <div id="FileUpload" class="relative mb-5.5 block w-full cursor-pointer appearance-none rounded border border-dashed border-primary bg-gray px-4 py-4 dark:bg-meta-4 sm:py-7.5">
                                        <input type="file" name="photo" accept="image/*" class="absolute inset-0 z-50 m-0 h-full w-full cursor-pointer p-0 opacity-0 outline-none" />
                                        <div class="flex flex-col items-center justify-center space-y-3">
                                            <span
                                                class="flex h-10 w-10 items-center justify-center rounded-full border border-stroke bg-white dark:border-strokedark dark:bg-boxdark">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M1.99967 9.33337C2.36786 9.33337 2.66634 9.63185 2.66634 10V12.6667C2.66634 12.8435 2.73658 13.0131 2.8616 13.1381C2.98663 13.2631 3.1562 13.3334 3.33301 13.3334H12.6663C12.8431 13.3334 13.0127 13.2631 13.1377 13.1381C13.2628 13.0131 13.333 12.8435 13.333 12.6667V10C13.333 9.63185 13.6315 9.33337 13.9997 9.33337C14.3679 9.33337 14.6663 9.63185 14.6663 10V12.6667C14.6663 13.1971 14.4556 13.7058 14.0806 14.0809C13.7055 14.456 13.1968 14.6667 12.6663 14.6667H3.33301C2.80257 14.6667 2.29387 14.456 1.91879 14.0809C1.54372 13.7058 1.33301 13.1971 1.33301 12.6667V10C1.33301 9.63185 1.63148 9.33337 1.99967 9.33337Z"
                                                        fill="#3C50E0" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7.5286 1.52864C7.78894 1.26829 8.21106 1.26829 8.4714 1.52864L11.8047 4.86197C12.0651 5.12232 12.0651 5.54443 11.8047 5.80478C11.5444 6.06513 11.1223 6.06513 10.8619 5.80478L8 2.94285L5.13807 5.80478C4.87772 6.06513 4.45561 6.06513 4.19526 5.80478C3.93491 5.54443 3.93491 5.12232 4.19526 4.86197L7.5286 1.52864Z"
                                                        fill="#3C50E0" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7.99967 1.33337C8.36786 1.33337 8.66634 1.63185 8.66634 2.00004V10C8.66634 10.3682 8.36786 10.6667 7.99967 10.6667C7.63148 10.6667 7.33301 10.3682 7.33301 10V2.00004C7.33301 1.63185 7.63148 1.33337 7.99967 1.33337Z"
                                                        fill="#3C50E0" />
                                                </svg>
                                            </span>
                                            <p class="text-sm font-medium">
                                                <span class="text-primary">Click to upload</span>
                                                or drag and drop
                                            </p>
                                            <p class="mt-1.5 text-sm font-medium">
                                                SVG, PNG, JPG or GIF
                                            </p>
                                            <p class="text-sm font-medium">
                                                (max, 800 X 800px)
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex justify-end gap-4.5">
                                        <button class="rounded border px-6 py-2" type="button">Cancel</button>
                                        <button class="rounded bg-primary px-6 py-2 text-gray" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ====== Settings Section End -->
            </div>
        </div>
    </main>
    <!-- ===== Main Content End ===== -->
</div>
<!-- ===== Content Area End ===== -->

@endsection

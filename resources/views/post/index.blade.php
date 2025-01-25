@extends('layouts.app')
@section('title', 'Create')
@section('content')
    <div class="m-6">
        <div class="flex justify-between items-center">
            <p>Blog Posts</p>
            <button type="button" id="createPostBtn"
                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create+</button>
        </div>
        <div class="cursor-pointer" title="Logout">
            <a href="{{ route('logout') }}">
                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 4H13V9H11.5V5.5H5.5V18.5H11.5V15H13V20H4V4Z"
                            fill="#1F2328"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.1332 11.25L15.3578 9.47463L16.4184 8.41397L20.0045 12L16.4184 15.586L15.3578 14.5254L17.1332 12.75H9V11.25H17.1332Z"
                            fill="#1F2328"></path>
                    </g>
                </svg>
            </a>
        </div>

            <div class="max-w-md mx-auto">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="seachInput"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search blog posts..." />
                    <button type="submit" id="searchBtn"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            S.No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Blog Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Author
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Content
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>
    <div class="relative z-10" id="modal" save-action="{{ route('post.store') }}" aria-labelledby="modal-title"
        role="dialog" aria-modal="true" style="display: none;">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold text-gray-900" id="modal-title">Create New Post</h3>
                            </div>
                        </div>

                        <!-- Form Start -->
                        <form id="createPostForm" method="POST" enctype="multipart/form-data" token="{{ csrf_token() }}">
                            @csrf
                            <div class="mt-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Post Name</label>
                                <input type="text" id="name" name="name"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <div id="postNameError" class="text-sm text-red-500 font-bold hidden">The post name is
                                    required</div>
                            </div>

                            <div class="mt-4">
                                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                                <div id="editor">
                                </div>
                                <div id="contentError" class="text-sm text-red-500 font-bold hidden">The post content is
                                    required</div>
                            </div>

                            <div class="mt-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                <input type="file" id="image" name="image"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <div id="imageError" class="text-sm text-red-500 font-bold hidden">The post image is
                                    required</div>
                            </div>
                        </form>
                        <!-- Form End -->
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button"
                            class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto"
                            id="createPostBtnConfirm">
                            Create Post
                        </button>
                        <button type="button"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                            id="closeModalBtn">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-10" id="editModal" aria-labelledby="modal-title" role="dialog" aria-modal="true"
        style="display: none;">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold text-gray-900" id="modal-title">Edit Post</h3>
                            </div>
                        </div>

                        <!-- Form Start -->
                        <form id="updatePostForm" method="POST" enctype="multipart/form-data"
                            token="{{ csrf_token() }}">
                            @csrf
                            <div class="mt-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Post Name</label>
                                <input type="text" id="editName" name="editName"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                                    required>
                            </div>

                            <div class="mt-4">
                                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                                <div id="edit_editor" data-="">
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                <input type="file" id="editImage" name="editImage"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                            </div>
                        </form>
                        <!-- Form End -->
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" id="updateBtn" editId
                            class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto"
                            id="updatePostBtnConfirm">
                            Update Post
                        </button>
                        <button type="button" id="cancelUpdateBtn"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                            id="closeEditModalBtn">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-10" id="viewModal" aria-labelledby="modal-title" role="dialog" aria-modal="true"
        style="display: none;">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold text-gray-900" id="modal-title">View Post</h3>
                            </div>
                        </div>

                        <!-- Form Start -->
                        <form id="updatePostForm" method="POST" enctype="multipart/form-data"
                            token="{{ csrf_token() }}">
                            @csrf
                            <div class="mt-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Post Name</label>
                                <input type="text" id="viewName" name="viewName"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500" readonly>
                            </div>

                            <div class="mt-4">
                                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                                <div id="view_editor" data-="" aria-readonly="true">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                <img name="viewImage" style="height: 150px" alt="Post Image" />
                            </div>
                        </form>
                        <!-- Form End -->
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                            id="closeViewModalBtn">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

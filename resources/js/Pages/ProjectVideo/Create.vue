

<template>
    <AppLayout title="Thêm  bộ video">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                Thêm bộ video
            </h2>
        </template>
        <div class="overflow-hidden  px-5 mb-3 ">
            <div class="w-100  p-1 flex justify-between items-center">
                <div class="  ">
                    <Link :href="route('ProjectVideo')" class="text-dark-700 hover:text-purple-900 font-bold underline decoration-1">
                    <icon :icon="['fas', 'arrow-left']" /> Trở về
                    </Link>
                </div>
                <div class="">
                    <button type="button" @click="submitForm" class="text-gray-900 bg-gradient-to-r from-purple-200 via-purple-400 to-purple-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <icon :icon="['fas', 'save']" class="mr-2" /> Lưu Dữ Liệu
                    </button>
                </div>
            </div>
        </div>
        <div class="pb-12">
            <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">

                <div class="grid grid-cols-12 relative">

                    <div class="col-span-6 p-2">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 mb-3 p">

                            <div class="mb-3">
                                <label for="name" class="block mb-2 font-bold text-base text-gray-900 dark:text-dark">Tên dữ liệu</label>
                                <input type="text" v-model="name" @input="updateSlug" placeholder="John" id="name" class="bg-gray-50 border text-base border-gray-300 text-gray-900  rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-purple-500 dark:focus:border-purple-500" required>
                                <span class="text-red-600 text-xs" ref="scroll_name">{{ error.name }}</span>

                                <input type="text" v-model="slug" class=" mt-3 bg-gray-50 border text-base border-gray-300 text-gray-900   w-full " disabled>
                                <span class="text-red-600 text-xs" ref="scroll_slug">{{ error.slug }}</span>


                            </div>
                            <div class="mb-3">

                                <label for="name" class="block mb-2 font-bold text-base text-gray-900 dark:text-dark">Nhập Mã Video Youtube </label>
                                <div class="text-base text-black/80">Vd: https://www.youtube.com/watch?v=mv-V2lKEi3E</div>
                                <div class="text-base text-black/80 mb-2">Mã sẽ là <span class="bg-black text-white px-5 ">mv-V2lKEi3E</span></div>
                                <input type="text" v-model="desc" placeholder="Nhập Mã Video Youtube" class="bg-gray-50 border text-base border-gray-300 text-gray-900  rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-purple-500 dark:focus:border-purple-500" required>


                                <span class="text-red-600 text-xs" ref="scroll_desc">{{ error.desc }}</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-span-6">
                        <div class="grid grid-cols-12">
                            <div class="col-span-6 p-2">
                                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 mb-3 p">
                                    <div class="mb-3">
                                        <label for="name" class="block mb-2 font-bold text-base text-gray-900 dark:text-dark">Ảnh đại diện</label>

                                        <InputUrlImage ref="url_avatar" />
                                        <span class="text-red-600 text-xs" ref="scroll_url_avatar">{{ error.url_avatar }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6 p-2">
                                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 mb-3 p">
                                    <div class="mb-3">
                                        <label for="name" class="block mb-2 font-bold text-base text-gray-900 dark:text-dark">Ảnh đại diện mobile</label>
                                        <span class="block mb-2 text-slate-600 text-sm">Không nhập sẽ tự động lấy đường dẫn ảnh đại diện </span>
                                        <InputUrlImage ref="url_avatar_mobile" />
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-span-12 p-2">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2 mb-3">
                            <label for="editer" class="block mb-2 font-bold text-base text-gray-900 dark:text-dark">Nhập Info</label>
                            <Editer ref="content" />
                        </div>
                    </div>
                    <div class="col-span-6 p-2">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-full p-3 mb-3 p">
                            <div class="mb-3">
                                <label for="name" class="block mb-2 font-bold text-base text-gray-900 dark:text-dark">Meta Image</label>
                                <InputUrlImage ref="meta_image" />
                                <span class="text-red-600 text-xs" ref="scroll_meta_image">{{ error.meta_image }}</span>

                            </div>
                        </div>

                    </div>
                    <div class="col-span-6 p-2">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2 mb-3">
                            <label for="editer" class="block mb-2 font-bold text-base text-gray-900 dark:text-dark">Thẻ Meta Title</label>
                            <input type="text" v-model="meta_title" placeholder="Nhập tiêu đề" id="name" class="bg-gray-50 border text-base border-gray-300 text-gray-900  rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-purple-500 dark:focus:border-purple-500" required>
                            <span class="text-red-600 text-xs" ref="scroll_meta_title">{{ error.meta_title }}</span>

                        </div>
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2 mb-3">
                            <label for="editer" class="block mb-2 font-bold text-base text-gray-900 dark:text-dark">Thẻ Meta Description</label>
                            <input type="text" v-model="meta_desc" placeholder="Nhập tiêu đề" id="name" class="bg-gray-50 border text-base border-gray-300 text-gray-900  rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-purple-500 dark:focus:border-purple-500" required>
                            <span class="text-red-600 text-xs" ref="scroll_meta_desc">{{ error.meta_desc }}</span>

                        </div>
                    </div>



                </div>

            </div>
        </div>


        <div class="bg-slate-900 overflow-hidden shadow-xl  p-2  ">
            <div class="w-100  p-1 flex justify-between items-center">
                <div class=" text-white ">
                    <Link :href="route('ProjectVideo')" class="text-dark-700 hover:text-purple-900 font-bold underline decoration-1">
                    <icon :icon="['fas', 'arrow-left']" /> Trở về
                    </Link>
                </div>
                <div class="">
                    <button type="button" @click="submitForm" class="text-gray-900 bg-gradient-to-r from-purple-200 via-purple-400 to-purple-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <icon :icon="['fas', 'save']" class="mr-2" /> Lưu Dữ Liệu
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>

import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import getSlug from 'speakingurl';

import InputUrlImage from '@/Components/InputUrlImage.vue';
import ButtonMutipleImage from '@/Components/ButtonMutipleImage.vue';
import Editer from '@/Components/Editer.vue';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';



export default {

    name: 'Create  Project',
    components: {
        InputUrlImage, ButtonMutipleImage, Editer, AppLayout, Link
    },

    data() {
        return {
            id_category_project: 1,
            name: '',
            slug: '',
            desc: '',
            meta_title: '',
            meta_desc: '',
            error: {
                id_category_project: '',
                url_avatar: '',
                name: '',
                slug: '',
                desc: '',
                meta_title: '',
                meta_image: '',
                meta_desc: '',
            },
        }
    },

    methods: {

        clearErrors() {
            this.error.id_category_project = "";
            this.error.url_avatar = "";
            this.error.name = "";
            this.error.slug = "";
            this.error.desc = "";
            this.error.meta_title = "";
            this.error.meta_image = "";
            this.error.meta_desc = "";
        },
        scrollToElement(nameElement) {
            // Sử dụng `ref` để lấy tham chiếu đến phần tử
            const element = this.$refs['scroll_' + nameElement];
            // Kiểm tra xem phần tử có tồn tại không
            if (element) {
                // Lấy kích thước của phần tử và cửa sổ trình duyệt
                const elementRect = element.getBoundingClientRect();
                const windowHeight = window.innerHeight || document.documentElement.clientHeight;

                // Tính toán vị trí cuộn sao cho phần tử nằm giữa màn hình
                const scrollPosition = elementRect.top - (windowHeight / 2 - elementRect.height / 2);

                // Cuộn tới phần tử
                window.scrollTo({
                    top: scrollPosition,
                    behavior: 'smooth',
                });
            }
        },
        updateSlug() {
            // Chuyển đổi chuỗi name thành slug
            this.slug = getSlug(this.name, { lang: 'vi' });
        },
        submitForm() {
            this.clearErrors();
            const url_avatar = this.$refs.url_avatar.url_image;

            const url_avatar_mobile = this.$refs.url_avatar_mobile.url_image;

            const id_category_project = this.id_category_project;
            const name = this.name;
            const slug = this.slug;
            const desc = this.desc;
            const meta_title = this.meta_title;
            const content = this.$refs.content.editer_data;
            const meta_image = this.$refs.meta_image.url_image;
            const meta_desc = this.meta_desc;

            axios.post('', {
                id_category_project: id_category_project,
                url_avatar: url_avatar,
                url_avatar_mobile: url_avatar_mobile,
                name: name,
                slug: slug,
                desc: desc,
                meta_title: meta_title,
                content: content,
                meta_image: meta_image,
                meta_desc: meta_desc,
            })
                .then((response) => {
                    if (response.data.error) {
                        toast.error(response.data.error, {
                            autoClose: 3000,
                        });
                        // this.scrollToElement(response.data.column);
                        this.error[response.data.column] = response.data.error;

                    } else {
                        toast.success("Uploads dữ liệu thành công", {
                            autoClose: 1000,
                        });
                    }

                })
                .catch((error) => {
                    console.log(error);
                });
        }
    },




}
</script>


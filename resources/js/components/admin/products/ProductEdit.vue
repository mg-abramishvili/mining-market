<template>
    <div>
        <ul class="box-tabs">
            <li @click="selectTab('general')" :class="{ 'active' : current_tab == 'general'}">Общая информация</li>
            <li @click="selectTab('gallery')" :class="{ 'active' : current_tab == 'gallery'}">Галерея</li>
        </ul>
        <div class="box px-4 py-4 mb-4">
            <div v-show="current_tab == 'general'" class="box-tab-content">
                <div class=" mb-4">
                    <label class="form-label">Наименование</label>
                    <input v-model="name" type="text" class="form-control">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-4">
                            <label class="form-label">Видеокарта</label>
                            <input v-model="gpu" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-4">
                            <label class="form-label">Кол-во видеокарт</label>
                            <input v-model="gpu_amount" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">Доходность</label>
                    <input v-model="dohodnost" type="text" class="form-control">
                </div>
                <div class="mb-4">
                    <label class="form-label">Цена</label>
                    <input v-model="price" type="text" class="form-control">
                </div>
            </div>
            
            <div v-show="current_tab == 'gallery'" class="box-tab-content">
                <file-pond
                    name="gallery[]"
                    ref="gallery"
                    label-idle="Выбрать картинки..."
                    v-bind:allow-multiple="true"
                    v-bind:allow-reorder="true"
                    accepted-file-types="image/jpeg, image/png"
                    :server="server"
                    v-bind:files="filepond_gallery_edit"
                />
            </div>

            <button :disabled="updateProduct_button == false"  @click="updateProduct(product.id)" class="btn btn-primary">Сохранить</button>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import vueFilePond from "vue-filepond";
    import "filepond/dist/filepond.min.css";
    import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
    import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
    import FilePondPluginImagePreview from "filepond-plugin-image-preview";
    const FilePond = vueFilePond(
        FilePondPluginFileValidateType,
        FilePondPluginImagePreview
    );
    export default {
        props: ['product_id'],
        data() {
            return {
                product: {},
                name: '',
                gpu: '',
                gpu_amount: '',
                dohodnost: '',
                price: '',
                filepond_gallery: [],
                filepond_gallery_edit: [],
                filepond_docs: [],
                filepond_docs_edit: [],
                current_tab: 'general',
                updateProduct_button: false,
                server: {
                    remove(filename, load) {
                        load('1');
                    },
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                        const formData = new FormData();
                        formData.append(fieldName, file, file.name);
                        const request = new XMLHttpRequest();
                        request.open('POST', '/_admin/file');
                        request.upload.onprogress = (e) => {
                            progress(e.lengthComputable, e.loaded, e.total);
                        };
                        request.onload = function() {
                            if (request.status >= 200 && request.status < 300) {
                                load(request.responseText);
                            }
                            else {
                                error('oh no');
                            }
                        };
                        request.send(formData);
                        return {
                            abort: () => {
                                request.abort();
                                abort();
                            }
                        };
                    },
                    revert: (filename, load) => {
                        load(filename)
                    },
                    load: (source, load, error, progress, abort, headers) => {
                        var myRequest = new Request(source);
                        fetch(myRequest).then(function(response) {
                            response.blob().then(function(myBlob) {
                                load(myBlob)
                            });
                        });
                    },
                },
                moment: moment,
            };
        },
        created() {
            this.getProductInfo()
        },
        methods: {
            getProductInfo() {
                axios
                .get(`/_admin/product/${this.product_id}`)
                .then((response => {
                    this.product = response.data
                    this.name = response.data.name
                    this.gpu = response.data.gpu
                    this.gpu_amount = response.data.gpu_amount
                    this.dohodnost = response.data.dohodnost
                    this.price = response.data.price
                    
                    if(response.data.gallery) {
                        this.filepond_gallery_edit = response.data.gallery.map(function(element){
                            {
                                return {
                                    source: element,
                                    options: {
                                        type: 'local',
                                    }
                                } 
                            }
                        })
                    }
                    
                }));

                this.updateProduct_button = true
            },
            selectTab(tab) {
                this.current_tab = tab
            },
            updateProduct(id) {
                if(document.getElementsByName("gallery[]")) {
                    this.gallery = []
                    document.getElementsByName("gallery[]").forEach((galleryItem) => {
                        if(galleryItem.value) {
                            this.gallery.push(galleryItem.value)
                        }
                    });
                }
                if(this.name && this.name.length > 0 && this.price && this.price > 0) {
                    this.updateProduct_button = false
                    axios
                    .put(`/_admin/product/${id}`, {
                        id: id,
                        name: this.name,
                        gpu: this.gpu,
                        gpu_amount: this.gpu_amount,
                        dohodnost: this.dohodnost,
                        price: this.price,
                        gallery: this.gallery,
                    })
                    .then((response => {
                        window.location.href = '/admin/products'
                    }))
                    .catch((error) => {
                        if(error.response) {
                            this.updateProduct_button = true
                            for(var key in error.response.data.errors){
                                console.log(key)
                                alert(key)
                            }
                        }
                    });
                } else {
                    alert('Заполните поля')
                }
            },
        },
    }
</script>
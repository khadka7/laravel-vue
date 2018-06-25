<template>
    <div>
        <h2>Products</h2><hr/>
        <div class="row">
            <div class="col-md-4" v-for="product in products">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://as.ftcdn.net/r/v1/pics/ea2e0032c156b2d3b52fa9a05fe30dedcb0c47e3/landing/images_photos.jpg" alt="Card image cap"/>
                    <div class="card-body">
                        <h5 class="card-title">{{product.name}}</h5>
                        <p class="card-text">{{product.details}}</p>
                        <router-link v-bind:to="{ name: 'product', params: { id:  product.id } }">
                            <a href="#" class="btn btn-primary">Detail</a>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="pagination">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link"
                           v-on:click="fetchPaginatedProducts(pagination.first_page)"
                           :disabled="!pagination.first_page">
                            First
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link"
                           v-on:click="fetchPaginatedProducts(pagination.prev_page_url)"
                           :disabled="!pagination.prev_page_url">
                            Previous
                        </a>
                    </li>

                    <li class="page-item" v-for="pageNo in meta.last_page" v-bind:class="{active:pageNo === meta.current_page}">
                        <a class="page-link" v-on:click="fetchProductsByNumber(pageNo)"
                           :disabled="!pageNo">{{pageNo}}</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link"
                           v-on:click="fetchPaginatedProducts(pagination.next_page_url)"
                           :disabled="!pagination.next_page_url">
                            Next
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link"
                           v-on:click="fetchPaginatedProducts(pagination.last_page)"
                           :disabled="!pagination.last_page">
                            Last
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
    import {backendUrl} from '../../Includes/Constant'

    export default {
        data:function () {
            return{
                products:{},
                productUrl : backendUrl+'/api/products',
                pagination:{},
                meta:{},
            }
        },
        methods: {
            fetchProducts() {
                let self = this;
                axios.get(this.productUrl)
                    .then(response =>{
                        // console.log(response.data.meta);
                        // console.log(response.data.links);
                        this.meta = response.data.meta;
                        this.products = response.data.data;
                        self.makePagination(response.data.links);
                })
            },
            fetchProductsByNumber(number){
                let productStaticUrl = backendUrl+'/api/products';
                this.productUrl = productStaticUrl+'?page='+number;
                this.fetchProducts();
            },
            makePagination(links){
                let pagination = {
                    first_page: links.first,
                    last_page: links.last,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                }
               this.pagination = pagination;
            },
            fetchPaginatedProducts(url){
                this.productUrl = url;
                this.fetchProducts();
            },

        },
        mounted(){
            this.fetchProducts();
        }
    }
</script>
  <?php  $this->load->view('admin/header'); ?>
    <div class="panel-body panel-primary" ng-controller="productController">
        <div class="panel-heading ">
            <h4>Danh sách sản phẩm</h4>
        </div>
        <table class="table table-bordered table-hover">
            <form action="<?php echo base_url()."admin/product"; ?>" method="post" ref='uploadForm' encType="multipart/form-data">
                <thead>
                    <tr bgcolor="#eee">
                        <th>
                            #
                        </th>

                        <th><input class="form-control" ng-model="productinfo.name" name="name" id="name" value="" title="Tên mặt hàng" placeholder="Product Name" required=""></th>
                        <th><input class="form-control number" type="number" name="cost" ng-model="productinfo.cost" value="" title="cost" placeholder="Cost" required=""></th>
                        <th>
                            <select name="catid" ng-model="productinfo.catid" class="form-control">
                        <option  ng-repeat="item in catelist" value="{{item.id}}">{{item.name}}</option>
                      
                    </select>
                        </th>
                        <th>
                            <input type="file" name="img_main">
                        </th>
                        <th>
                            <input type="file" name="img_sub">
                        </th>

                        <th>
                            <!-- <button type="submit" id="add" ng-click="addproduct(productinfo)" name="submit" class="btn btn-primary btn-sm">Add</button> -->
                              <input type="hidden" name="func" value="add" name="sub_img">
                            <button type="submit" id="add" name="submit" value="submit" class="btn btn-primary btn-sm">Add</button>

                        </th>


                    </tr>
                    <tr bgcolor="#eee">
                        <th nowrap="">#</th>

                        <th nowrap="">Product Name</th>
                        <th nowrap="">Cost</th>
                        <th nowrap="">type</th>
                        <th nowrap="">img1</th>
                        <th nowrap="">img2</th>
                        <th nowrap="">Function</th>
                    </tr>
                </thead>
            </form>
            <tbody>
                <tr ng-onload ng-repeat="item in productlist">
                    <td title="44">{{$index + 1}}</td>
                    <td>
                        <span editable-text="item.name" e-name="name" e-form="rowform">
                        {{item.name}}
                    </span>
                    </td>
                    <td>
                        <span editable-text="item.cost" e-name="cost" e-form="rowform">
                        {{item.cost | number}}
                    </span> VNĐ
                    </td>
                    <td>
                        <span editable-select="item.catid" e-name="group" onshow="loadcatname()" e-form="rowform" e-ng-options="g.id as g.name for g in groups">
                            {{ showCate(item)}}
                             </span>
                    </td>
                    <td class="img-pop" data="{{item.img_main}}" name="img_main" productid="{{item.id}}">
                        {{item.img_main}}
                    </td>
                    <td class="img-pop" data="{{item.img_sub}}" name="img_sub" productid="{{item.id}}">
                        {{item.img_sub}}
                    </td>

                    <td nowrap="">

                        <!-- form -->
                        <form editable-form name="rowform" onaftersave="editproduct(item)" ng-show="rowform.$visible" class="form-buttons form-inline">
                            <button type="submit" ng-disabled="rowform.$waiting" class="btn btn-primary">
                            Save
                        </button>
                            <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-default">
                            Cancel
                        </button>
                        </form>
                        <div class="buttons" ng-show="!rowform.$visible">
                            <button type="button" class="btn btn-warning btn-sm" ng-click="rowform.$show()"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn btn-danger" ng-click="deleteproduct(item)"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
        <div id="popup" style="display:none">
            <div id="innerpopup">
                <div class="functionedit">
                    <span class="close-pop"><i class="far fa-times-circle"></i></span>
                    <span id="editproduct"><i class="fas fa-edit"></i></span>
                </div>

                <img src="" id="imgpopup">
            </div>

        </div>
        <div id="formedit" style="display:none">
            <div class="inner">
                <span class="close-pop"><i class="far fa-times-circle"></i></span>
                <p> Chọn hình ảnh</p>
                <form method="POST" action="<?php echo base_url()."admin/product"; ?>" ref='uploadForm' encType="multipart/form-data">
                    <input id="editproductid" type="hidden" name="id" value="">
                    <input id="editimgname" type="file" name="img_main">
                     <input  type="hidden" name="func" value="edit">
                    <button type="submit" id="edit" name="submit" class="btn btn-primary btn-sm" value="submit">edit</button>
                </form>
            </div>

        </div>
    </div>
    <script>
        // angulajs
        app.run(function(editableOptions) {
            editableOptions.theme = 'bs3';
        });


        app.controller("productController", ['$scope', '$filter', "product", function($scope, $filter, product) {
            $scope.checkedit = false;
            // load user info
            var catehidden = angular.element(document.getElementsByName('catehidden')[0]).val();
            product.getcate().then(function(response) {
                $scope.catelist = response.data;


            });
            product.get().then(function(response) {
                $scope.productlist = response.data;
                $(document).ready(function() {
                    $(".img-pop").click(function() {
                        $("#popup").show();
                        var src = $(this).attr("data");
                        var name = $(this).attr("name");
                        var productid = $(this).attr("productid");
                        $("#imgpopup").attr("src", src)
                        $("#editimgname").attr("name", name);
                        $("#editproductid").attr("value", productid);
                    });

                    $("#editproduct").click(function() {
                        $("#formedit").show();
                        $("#popup").hide();
                        var name = $(this).attr("name");
                        console.log(name)
                        $("#editimgname").attr("name", name);

                    });

                    $(".close-pop").click(function() {
                        $("#popup").hide();
                        $("#formedit").hide();
                    });

                });
            });

            $scope.groups = [];
            $scope.loadcatname = function() {
                product.getcate().then(function(response) {
                    $scope.groups = response.data;
                    

                });
            };

            $scope.showCate = function(cate) {

                if (cate.group && $scope.groups.length) {

                    var selected = $filter('filter')($scope.groups, {
                        id: cate.catid
                    });
                    return selected.length ? selected[0].catname : 'Not set';
                     
                } else {

                    return cate.catname;
                   
                }
            };

            $scope.editproduct = function(item) {
                product.editproduct(item).then(function(response) {
                    $scope.productlist = response.data;
                    $(document).ready(function() {
                        $(".img-pop").click(function() {
                            $("#popup").show();
                            var src = $(this).attr("data");
                            var name = $(this).attr("name");
                            var productid = $(this).attr("productid");
                            $("#imgpopup").attr("src", src)
                            $("#editimgname").attr("name", name);
                            $("#editproductid").attr("value", productid);
                        });

                        $("#editproduct").click(function() {
                            $("#formedit").show();
                            $("#popup").hide();
                            var name = $(this).attr("name");
                            console.log(name)
                            $("#editimgname").attr("name", name);

                        });

                        $(".close-pop").click(function() {
                            $("#popup").hide();
                            $("#formedit").hide();
                        });

                    });
                });
            };

            $scope.addproduct = function(productinfo) {

                productinfo2 = {
                    name: productinfo.name,
                    cost: productinfo.cost,
                    catid: productinfo.catid
                };
                console.log(productinfo2);
                product.addproduct(productinfo2).then(function(response) {
                    $scope.productlist = response.data;
                    $scope.productinfo.name = "";
                    $scope.productinfo.cost = 0;
                    $(document).ready(function() {
                        $(".img-pop").click(function() {
                            $("#popup").show();
                            var src = $(this).attr("data");
                            var name = $(this).attr("name");
                            var productid = $(this).attr("productid");
                            $("#imgpopup").attr("src", src)
                            $("#editimgname").attr("name", name);
                            $("#editproductid").attr("value", productid);
                        });

                        $("#editproduct").click(function() {
                            $("#formedit").show();
                            $("#popup").hide();
                            var name = $(this).attr("name");
                            console.log(name)
                            $("#editimgname").attr("name", name);

                        });

                        $(".close-pop").click(function() {
                            $("#popup").hide();
                            $("#formedit").hide();
                        });

                    });
                });


            }
            $scope.deleteproduct = function(item) {
                product.deleteproduct(item.id).then(function(response) {
                    $scope.productlist = response.data;
                    $(document).ready(function() {
                        $(".img-pop").click(function() {
                            $("#popup").show();
                            var src = $(this).attr("data");
                            var name = $(this).attr("name");
                            var productid = $(this).attr("productid");
                            $("#imgpopup").attr("src", src)
                            $("#editimgname").attr("name", name);
                            $("#editproductid").attr("value", productid);
                        });

                        $("#editproduct").click(function() {
                            $("#formedit").show();
                            $("#popup").hide();
                            var name = $(this).attr("name");
                            console.log(name)
                            $("#editimgname").attr("name", name);

                        });

                        $(".close-pop").click(function() {
                            $("#popup").hide();
                            $("#formedit").hide();
                        });

                    });
                });

            }
        }]);
        app.factory("product", ["$http", function($http) {
            return {
                getcate: function() {
                    return $http.get("/duy_ci/api/product/getallcate");
                },
                get: function() {
                    return $http.get("/duy_ci/api/product/getallproduct");
                },
                deleteproduct: function(id) {
                    data={
                        id:id
                    };
                    return $http.post("/duy_ci/api/product/delete/",data);
                },
                editproduct: function(product) {
                    return $http.put("/duy_ci/api/product/edit", product);
                }
            }
        }]);
    </script>
     <?php  $this->load->view('admin/footer'); ?>
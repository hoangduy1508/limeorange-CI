<?php  $this->load->view('admin/header'); ?>
    <div id="content-wrapper" ng-controller="bannerController">
        <h1>danh sach banner</h1>
        <table class="table table-bordered table-hover">
            <thead>
                <th>Stt</th>
                <th>Image</th>
                <th>Type</th>
                <th>Link</th>
                <th>Function</th>
            </thead>

            <tr ng-repeat="item in bannerlist">
                <td>{{$index+1}}</td>
                <td class="img-pop" data="{{item.img}}" bannerid="{{item.id}}">
                    {{item.img}}
                </td>
                <td>


                    <span editable-text="item.type" e-name="name" e-form="rowform">
                        {{ item.type }}
                    </span>
                </td>
                <td>

                    <span editable-text="item.link" e-name="name" e-form="rowform">
                        <a href="{{ item.link }}"> {{ item.link }}</a>
                    </span>


                </td>
                <td>


                    <!-- form -->
                    <form editable-form name="rowform" onaftersave="editbanner(item)" ng-show="rowform.$visible" class="form-buttons form-inline">
                        <button type="submit" ng-disabled="rowform.$waiting" class="btn btn-primary">
                            Save
                        </button>
                        <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-default">
                            Cancel
                        </button>
                    </form>
                    <div class="buttons" ng-show="!rowform.$visible">
                        <button type="button" class="btn btn-warning btn-sm" ng-click="rowform.$show()"><i class="fas fa-pencil-alt"></i></button>
                        <button type="button" class="btn btn-danger" ng-click="deletebanner(item)"><i class="fas fa-trash-alt"></i></button>
                    </div>


                </td>
            </tr>


        </table>
        <div id="themmoi_img">
            <h3 class="title">Thêm mới</h3>
            <div id="form-them">
                <form action="<?php echo base_url()."admin"; ?>" method="post" ref='uploadForm' encType="multipart/form-data">

                    <div class="form-group col-md-4">
                        <label for="pwd">Link dẫn</label>
                        <div class="input"> <input type="text" placeholder="Url link to where?" class="form-control " name="link" id="link"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pwd">Loại</label>
                        <div class="input">

                            <select name="type" class="form-control">
                                <option value="1"> loại 1</option>
                                <option value="2"> loại 2</option>
                                <option value="3"> loại 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pwd">Hình ảnh sản phẩm:</label>
                        <div class="input"> <input type="file" name="file"></div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-default" value="upload">Thêm sản phẩm</button>
                </form>

            </div>
        </div>
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
                <form method="post" action="<?php echo base_url()."admin"; ?>" ref='uploadForm' encType="multipart/form-data">
                    <input  type="hidden" name="func" value="edit">
                    <input id="editbannerid" type="hidden" name="id" value="">
                    <input id="editimgname" type="file" name="file">
                    <button type="submit" id="edit" name="submit" value="submit" class="btn btn-primary btn-sm">edit</button>
                </form>
            </div>

        </div>
    </div>

    <script>
        // angulajs
        app.run(function(editableOptions) {
            editableOptions.theme = 'bs3';
        });
        app.controller("bannerController", ['$scope', "banner", function($scope, banner) {
            $scope.checkedit = false;
            // load user info
            banner.get().then(function(response) {
                $scope.bannerlist = response.data;
                $(document).ready(function() {
                    $(".img-pop").click(function() {
                        $("#popup").show();
                        var src = $(this).attr("data");
                        var bannerid = $(this).attr("bannerid");
                        $("#imgpopup").attr("src", src)

                        $("#editbannerid").attr("value", bannerid);
                    });

                    $("#editproduct").click(function() {
                        $("#formedit").show();
                        $("#popup").hide();

                    });

                    $(".close-pop").click(function() {
                        $("#popup").hide();
                        $("#formedit").hide();
                    });

                });

            });



            $scope.editbanner = function(item) {

                banner.editbanner(item).then(function(response) {
                    $scope.bannerlist = response.data;
                    $(document).ready(function() {
                        $(".img-pop").click(function() {
                            $("#popup").show();
                            var src = $(this).attr("data");
                            var bannerid = $(this).attr("bannerid");
                            $("#imgpopup").attr("src", src)

                            $("#editbannerid").attr("value", bannerid);
                        });

                        $("#editproduct").click(function() {
                            $("#formedit").show();
                            $("#popup").hide();

                        });

                        $(".close-pop").click(function() {
                            $("#popup").hide();
                            $("#formedit").hide();
                        });

                    });

                });
            }
            $scope.deletebanner = function(item) {
                banner.deletebanner(item.id).then(function(response) {
                    $scope.bannerlist = response.data;
                    $(document).ready(function() {
                        $(".img-pop").click(function() {
                            $("#popup").show();
                            var src = $(this).attr("data");
                            var bannerid = $(this).attr("bannerid");
                            $("#imgpopup").attr("src", src)

                            $("#editbannerid").attr("value", bannerid);
                        });

                        $("#editproduct").click(function() {
                            $("#formedit").show();
                            $("#popup").hide();

                        });

                        $(".close-pop").click(function() {
                            $("#popup").hide();
                            $("#formedit").hide();
                        });

                    });

                });
            }
        }]);
        app.factory("banner", ["$http", function($http) {
            return {
                get: function() {
                    return $http.get("/duy_ci/api/banner/allbanner");
                },

                deletebanner: function(id) {
                    var data = {
                        id :id
                    };
                    return $http.post("/duy_ci/api/banner/delete/" , data);
                },
                editbanner: function(bannerinfo) {
                    return $http.put("/duy_ci/api/banner/edit", bannerinfo);
                }
            }
        }]);
    </script>
  <?php  $this->load->view('admin/footer'); ?>


App.controller('showTimeContoller', function ($scope, $http, $timeout, $interval, $filter) {
    $scope.selectShowtime = {"date": "", "time": "", "theater": "", "seats": 1, "event_id": ""};

    $scope.selectDate = function (dateo) {
        $scope.selectShowtime.date = dateo;
        $scope.selectShowtime.time = "";
    }
    $scope.selectTime = function (timeo, theater, event_id) {
        $scope.selectShowtime.time = timeo;
        $scope.selectShowtime.theater = theater;
        $scope.selectShowtime.event_id = event_id;
    }

    $scope.selectedSeats = function (noseats) {
        $scope.selectShowtime.seats = noseats;
    }
})


App.controller('sitSelectContoller', function ($scope, $http, $timeout, $interval, $filter) {
    $scope.theaterLayout = {"layout": {}, "seatscount": seatsgbl, "suggetion": [], "wheelchair": {}};

    var url = baseurl + "Api/" + layoutgbl + "?sdate=" + select_date_gbl + "&stime=" + select_time_gbl + "&th_id=" + theater_id_gbl + "&mv_id=" + movie_id_gbl + "&template_id=" + template_id;
    $http.get(url).then(function (rdata) {
        $scope.theaterLayout.layout = rdata.data;
        $scope.theaterLayout.wheelchair = rdata.data.wheelchair;

        $timeout(function () {
            for (wc in $scope.theaterLayout.wheelchair) {
                $("#" + wc).addClass("wheelchairseat");
            }
        }, 1000);

    }, function () {
    })

    $scope.seatSelection = {"selected": {}, "total": 0};

    $scope.getTotalPrice = function () {
        var total = 0;
        for (k in $scope.seatSelection.selected) {
            var temp = $scope.seatSelection.selected[k].price;
            console.log(temp)
            total += Number(temp);
        }
        console.log(total)
        $scope.seatSelection.total = total;
        var seatlist = Object.keys($scope.seatSelection.selected);

    };

    $scope.selectSeat = function (seatobj, price) {
        swal({
            title: 'Choosing Seat(s)',
            onOpen: function () {
                swal.showLoading()
            }
        })
        var seatlist = Object.keys($scope.seatSelection.selected);
        if (seatlist.length == seatsgbl) {
            $scope.seatSelection.selected = {};
        }
        $timeout(function () {
            for (st in $scope.theaterLayout.suggetion) {
                var sgobj = $scope.theaterLayout.suggetion[st];
                if ($scope.seatSelection.selected[sgobj]) {
                    delete $scope.seatSelection.selected[sgobj];
                } else {
                    $scope.seatSelection.selected[sgobj] = {'price': price, 'seat': sgobj};
                }
            }
            swal.close();
            $scope.getTotalPrice();
        }, 500)
    }



    $scope.selectRemoveClass = function (seatobj, sclass) {
        $(".seaticon").removeClass("suggestion");
    }

    $scope.selectSeatSuggest = function (seatobj, sclass) {
        var seatcount = Number($scope.theaterLayout.seatscount);
        var seatlistselected = Object.keys($scope.seatSelection.selected);
        var selectedseatlength = seatlistselected.length;
        var seatcount_n = Number(seatsgbl);
        var avl_seatno = seatcount_n - selectedseatlength;
        if (selectedseatlength == seatcount_n) {
            avl_seatno = seatcount_n;
        }
        $scope.theaterLayout.suggetion = [];
        $(".seaticon").removeClass("suggestion");
        var prefix = seatobj.split("-")[0];
        var listofrow = $scope.theaterLayout.layout.sitclass[sclass].row[prefix];
        var count = 0;
        var seatlist = Object.keys(listofrow);
        var seatindex = seatlist.indexOf(seatobj);

        var slimit = (seatindex + avl_seatno);

        var suggestion = [];
        for (i = seatindex; i < slimit; i++) {
            var stobj = seatlist[i];
            if (listofrow[stobj] == 'A') {
                $scope.theaterLayout.suggetion.push(stobj);
                $("#" + stobj).addClass("suggestion");
            }
        }
    }

})


App.controller('checkoutContoller', function ($scope, $http, $timeout, $interval, $filter) {
    $scope.selectPaymenttype = {"ptype": "Cash On Delivery"};
    $scope.selectPayment = function (ptype) {
        $scope.selectPaymenttype.ptype = ptype;
    }
})

App.controller('ticketPaymentController', function ($scope, $http, $timeout, $interval, $filter) {
    $scope.selectPaymenttype = {"ptype": "Cash On Delivery"};
    $scope.selectPayment = function (ptype) {
        $scope.selectPaymenttype.ptype = ptype;
    }
})

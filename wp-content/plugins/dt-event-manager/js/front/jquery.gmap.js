! function(a) {
    "use strict";
    var b = function() {
        this.markers = [], this.mainMarker = !1, this.icon = "http://www.google.com/mapfiles/marker.png"
    };
    b.prototype.dist = function(a) {
        return Math.sqrt(Math.pow(this.markers[0].latitude - a.latitude, 2) + Math.pow(this.markers[0].longitude - a.longitude, 2))
    }, b.prototype.setIcon = function(a) {
        this.icon = a
    }, b.prototype.addMarker = function(a) {
        this.markers[this.markers.length] = a
    }, b.prototype.getMarker = function() {
        if (this.mainmarker) return this.mainmarker;
        var a, b;
        return this.markers.length > 1 ? (a = new c.MarkerImage("http://thydzik.com/thydzikGoogleMap/markerlink.php?text=" + this.markers.length + "&color=EF9D3F"), b = "cluster of " + this.markers.length + " markers") : (a = new c.MarkerImage(this.icon), b = this.markers[0].title), this.mainmarker = new c.Marker({
            position: new c.LatLng(this.markers[0].latitude, this.markers[0].longitude),
            icon: a,
            title: b,
            map: null
        }), this.mainmarker
    };
    var c = google.maps,
        d = new c.Geocoder,
        e = 0,
        f = 0,
        g = {};
    g = {
        init: function(b) {
            var d, e = a.extend({}, a.fn.gMap.defaults, b);
            for (d in a.fn.gMap.defaults.icon) e.icon[d] || (e.icon[d] = a.fn.gMap.defaults.icon[d]);
            return this.each(function() {
                var f, h, b = a(this),
                    d = g._getMapCenter.apply(b, [e]);
                "fit" == e.zoom && (e.zoomFit = !0, e.zoom = g._autoZoom.apply(b, [e]));
                var i = {
                    zoom: e.zoom,
                    center: d,
                    mapTypeControl: e.mapTypeControl,
                    mapTypeControlOptions: {},
                    zoomControl: e.zoomControl,
                    zoomControlOptions: {},
                    panControl: e.panControl,
                    panControlOptions: {},
                    scaleControl: e.scaleControl,
                    scaleControlOptions: {},
                    streetViewControl: e.streetViewControl,
                    streetViewControlOptions: {},
                    mapTypeId: e.maptype,
                    scrollwheel: e.scrollwheel,
                    maxZoom: e.maxZoom,
                    minZoom: e.minZoom
                };
                e.controlsPositions.mapType && (i.mapTypeControlOptions.position = e.controlsPositions.mapType), e.controlsPositions.zoom && (i.zoomControlOptions.position = e.controlsPositions.zoom), e.controlsPositions.pan && (i.panControlOptions.position = e.controlsPositions.pan), e.controlsPositions.scale && (i.scaleControlOptions.position = e.controlsPositions.scale), e.controlsPositions.streetView && (i.streetViewControlOptions.position = e.controlsPositions.streetView), e.styles && (i.styles = e.styles), i.mapTypeControlOptions.style = e.controlsStyle.mapType, i.zoomControlOptions.style = e.controlsStyle.zoom, i = a.extend(i, e.extra);
                var j = new c.Map(this, i);
                if (e.log && console.log("map center is:"), e.log && console.log(d), b.data("$gmap", j), b.data("gmap", {
                        opts: e,
                        gmap: j,
                        markers: [],
                        markerKeys: {},
                        infoWindow: null,
                        clusters: []
                    }), 0 !== e.controls.length)
                    for (f = 0; f < e.controls.length; f += 1) j.controls[e.controls[f].pos].push(e.controls[f].div);
                e.clustering.enabled ? (h = b.data("gmap"), function(a) {
                    h.markers = a
                }(e.markers), g._renderCluster.apply(b, []), c.event.addListener(j, "bounds_changed", function() {
                    g._renderCluster.apply(b, [])
                })) : 0 !== e.markers.length && g.addMarkers.apply(b, [e.markers]), g._onComplete.apply(b, [])
            })
        },
        _delayedMode: !1,
        _onComplete: function() {
            var a = this.data("gmap"),
                b = this;
            if (0 !== e) return void window.setTimeout(function() {
                g._onComplete.apply(b, [])
            }, 100);
            if (g._delayedMode) {
                var c = g._getMapCenter.apply(this, [a.opts, !0]);
                if (g._setMapCenter.apply(this, [c]), a.opts.zoomFit) {
                    var d = g._autoZoom.apply(this, [a.opts, !0]);
                    a.gmap.setZoom(d)
                }
            }
            a.opts.onComplete()
        },
        _setMapCenter: function(a) {
            var b = this.data("gmap");
            if (b && b.opts.log && console.log("delayed setMapCenter called"), b && void 0 !== b.gmap && 0 == e) b.gmap.setCenter(a);
            else {
                var c = this;
                window.setTimeout(function() {
                    g._setMapCenter.apply(c, [a])
                }, 100)
            }
        },
        _boundaries: null,
        _getBoundaries: function(a) {
            var c, b = a.markers,
                d = 1e3,
                e = -1e3,
                f = 1e3,
                h = -1e3;
            if (b) {
                for (c = 0; c < b.length; c += 1) b[c].latitude && b[c].longitude && (d > b[c].latitude && (d = b[c].latitude), e < b[c].longitude && (e = b[c].longitude), f > b[c].longitude && (f = b[c].longitude), h < b[c].latitude && (h = b[c].latitude), a.log && console.log(b[c].latitude, b[c].longitude, d, e, f, h));
                g._boundaries = {
                    N: d,
                    E: e,
                    W: f,
                    S: h
                }
            }
            return d == -1e3 && (g._boundaries = {
                N: 0,
                E: 0,
                W: 0,
                S: 0
            }), g._boundaries
        },
        _getMapCenter: function(a, b) {
            var e, h, i, j, f = this;
            if (a.markers.length && ("fit" == a.latitude || "fit" == a.longitude)) return b && (a.markers = g._convertMarkers(data.markers)), j = g._getBoundaries(a), e = new c.LatLng((j.N + j.S) / 2, (j.E + j.W) / 2), a.log && console.log(b, j, e), e;
            if (a.latitude && a.longitude) return e = new c.LatLng(a.latitude, a.longitude);
            if (e = new c.LatLng(0, 0), a.address) return d.geocode({
                address: a.address
            }, function(b, c) {
                c === google.maps.GeocoderStatus.OK ? g._setMapCenter.apply(f, [b[0].geometry.location]) : a.log && console.log("Geocode was not successful for the following reason: " + c)
            }), e;
            if (a.markers.length > 0) {
                for (i = null, h = 0; h < a.markers.length; h += 1)
                    if (a.markers[h].setCenter) {
                        i = a.markers[h];
                        break
                    }
                if (null === i)
                    for (h = 0; h < a.markers.length; h += 1) {
                        if (a.markers[h].latitude && a.markers[h].longitude) {
                            i = a.markers[h];
                            break
                        }
                        a.markers[h].address && (i = a.markers[h])
                    }
                if (null === i) return e;
                if (i.latitude && i.longitude) return new c.LatLng(i.latitude, i.longitude);
                i.address && d.geocode({
                    address: i.address
                }, function(b, c) {
                    c === google.maps.GeocoderStatus.OK ? g._setMapCenter.apply(f, [b[0].geometry.location]) : a.log && console.log("Geocode was not successful for the following reason: " + c)
                })
            }
            return e
        },
        _renderCluster: function() {
            var f, h, i, a = this.data("gmap"),
                c = a.markers,
                d = a.clusters,
                e = a.opts;
            for (f = 0; f < d.length; f += 1) d[f].getMarker().setMap(null);
            if (d.length = 0, i = a.gmap.getBounds(), !i) {
                var j = this;
                return void window.setTimeout(function() {
                    g._renderCluster.apply(j)
                }, 1e3)
            }
            var o, p, r, s, k = i.getNorthEast(),
                l = i.getSouthWest(),
                m = k.lat() - l.lat(),
                n = [],
                q = m * e.clustering.clusterSize / 100;
            for (f = 0; f < c.length; f += 1) c[f].latitude < k.lat() && c[f].latitude > l.lat() && c[f].longitude < k.lng() && c[f].longitude > l.lng() && (n[n.length] = c[f]);
            for (e.log && console.log("number of markers " + n.length + "/" + c.length), e.log && console.log("cluster radius: " + q), f = 0; f < n.length; f += 1) {
                for (p = 1e4, o = -1, h = 0; h < d.length && (r = d[h].dist(n[f]), !(r < q && (p = r, o = h, e.clustering.fastClustering))); h += 1);
                o === -1 ? (s = new b, s.addMarker(n[f]), d[d.length] = s) : d[o].addMarker(n[f])
            }
            for (e.log && console.log("Total clusters in viewport: " + d.length), h = 0; h < d.length; h += 1) d[h].getMarker().setMap(a.gmap)
        },
        _processMarker: function(a, b, d, e) {
            var i, j, f = this.data("gmap"),
                g = f.gmap,
                h = f.opts;
            if (void 0 === e && (e = new c.LatLng(a.latitude, a.longitude)), !b) {
                var k = {
                    image: h.icon.image,
                    iconSize: new c.Size(h.icon.iconsize[0], h.icon.iconsize[1]),
                    iconAnchor: new c.Point(h.icon.iconanchor[0], h.icon.iconanchor[1]),
                    infoWindowAnchor: new c.Size(h.icon.infowindowanchor[0], h.icon.infowindowanchor[1])
                };
                b = new c.MarkerImage(k.image, k.iconSize, null, k.iconAnchor)
            }
            if (!d) {
                ({
                    image: h.icon.shadow,
                    iconSize: new c.Size(h.icon.shadowsize[0], h.icon.shadowsize[1]),
                    anchor: k && k.iconAnchor ? k.iconAnchor : new c.Point(h.icon.iconanchor[0], h.icon.iconanchor[1])
                })
            }
            j = {
                position: e,
                icon: b,
                title: a.title,
                map: null,
                draggable: a.draggable === !0
            }, h.clustering.enabled || (j.map = g), i = new c.Marker(j), i.setShadow(d), f.markers.push(i), a.key && (f.markerKeys[a.key] = i);
            var m;
            if (a.html) {
                var n = "string" == typeof a.html ? h.html_prepend + a.html + h.html_append : a.html,
                    o = {
                        content: n,
                        pixelOffset: a.infoWindowAnchor
                    };
                h.log && console.log("setup popup with data"), h.log && console.log(o), m = new c.InfoWindow(o), c.event.addListener(i, "click", function() {
                    h.log && console.log("opening popup " + a.html), h.singleInfoWindow && f.infoWindow && f.infoWindow.close(), m.open(g, i), f.infoWindow = m
                })
            }
            a.html && a.popup && (h.log && console.log("opening popup " + a.html), m.open(g, i), f.infoWindow = m), a.onDragEnd && c.event.addListener(i, "dragend", function(b) {
                h.log && console.log("drag end"), a.onDragEnd(b)
            })
        },
        _convertMarkers: function(a) {
            var c, b = [];
            for (c = 0; c < a.length; c += 1) b[c] = {
                latitude: a[c].getPosition().lat(),
                longitude: a[c].getPosition().lng()
            };
            return b
        },
        _geocodeMarker: function(a, b, h) {
            var i = this;
            d.geocode({
                address: a.address
            }, function(d, j) {
                j === c.GeocoderStatus.OK ? (e -= 1, i.data("gmap").opts.log && console.log("Geocode was successful with point: ", d[0].geometry.location), g._processMarker.apply(i, [a, b, h, d[0].geometry.location])) : (j === c.GeocoderStatus.OVER_QUERY_LIMIT && (i.data("gmap").opts.noAlerts || 0 !== f || alert("Error: too many geocoded addresses! Switching to 1 marker/s mode."), f += 1e3, window.setTimeout(function() {
                    g._geocodeMarker.apply(i, [a, b, h])
                }, f)), i.data("gmap").opts.log && console.log("Geocode was not successful for the following reason: " + j))
            })
        },
        _autoZoom: function(b, c) {
            var f, h, i, j, d = a(this).data("gmap"),
                e = a.extend({}, d ? d.opts : {}, b),
                k = 39135.758482;
            for (e.log && console.log("autozooming map"), c && (e.markers = g._convertMarkers(d.markers)), h = g._getBoundaries(e), i = 111e3 * (h.E - h.W) / this.width(), j = 111e3 * (h.S - h.N) / this.height(), f = 2; f < 20 && !(i > k || j > k); f += 1) k /= 2;
            return f - 2
        },
        addMarkers: function(a) {
            var b = this.data("gmap").opts;
            if (0 !== a.length) {
                b.log && console.log("adding " + a.length + " markers");
                for (var c = 0; c < a.length; c += 1) g.addMarker.apply(this, [a[c]])
            }
        },
        addMarker: function(a) {

            var b = this.data("gmap").opts;
            b.log && console.log("putting marker at " + a.latitude + ", " + a.longitude + " with address " + a.address + " and html " + a.html);
            var d = {
                    image: b.icon.image,
                    iconSize: new c.Size(b.icon.iconsize[0], b.icon.iconsize[1]),
                    iconAnchor: new c.Point(b.icon.iconanchor[0], b.icon.iconanchor[1]),
                    infoWindowAnchor: new c.Size(b.icon.infowindowanchor[0], b.icon.infowindowanchor[1])
                },
                f = {
                    image: b.icon.shadow,
                    iconSize: new c.Size(b.icon.shadowsize[0], b.icon.shadowsize[1]),
                    anchor: new c.Point(b.icon.shadowanchor[0], b.icon.shadowanchor[1])
                };
            a.infoWindowAnchor = d.infoWindowAnchor, a.icon && (a.icon.image && (d.image = a.icon.image), a.icon.iconsize && (d.iconSize = new c.Size(a.icon.iconsize[0], a.icon.iconsize[1])), a.icon.iconanchor && (d.iconAnchor = new c.Point(a.icon.iconanchor[0], a.icon.iconanchor[1])), a.icon.infowindowanchor && (d.infoWindowAnchor = new c.Size(a.icon.infowindowanchor[0], a.icon.infowindowanchor[1])), a.icon.shadow && (f.image = a.icon.shadow), a.icon.shadowsize && (f.iconSize = new c.Size(a.icon.shadowsize[0], a.icon.shadowsize[1])), a.icon.shadowanchor && (f.anchor = new c.Point(a.icon.shadowanchor[0], a.icon.shadowanchor[1])));

            var h = new c.MarkerImage(d.image, d.iconSize, null, d.iconAnchor),
                i = new c.MarkerImage(f.image, f.iconSize, null, f.anchor);

            a.icon&&void 0==a.icon.iconsize&&(h=new c.MarkerImage(d.image)); // Gokul - Fix for, if custom marker icon given without icon size, icon will not show properly

            if (a.address) "_address" === a.html && (a.html = a.address), "_address" == a.title && (a.title = a.address), b.log && console.log("geocoding marker: " + a.address), e += 1, g._delayedMode = !0, g._geocodeMarker.apply(this, [a, h, i]);
            else {
                "_latlng" === a.html && (a.html = a.latitude + ", " + a.longitude), "_latlng" == a.title && (a.title = a.latitude + ", " + a.longitude);
                var j = new c.LatLng(a.latitude, a.longitude);
                g._processMarker.apply(this, [a, h, i, j])
            }
        },
        
        
        removeAllMarkers: function() {
            var c, a = this.data("gmap").markers;
               // b = this.data("gmap").markerKeys; // no
            for (c = 0; c < a.length; c += 1) a[c].setMap(null), delete a[c];
            a.length = 0;
            //for (c in b) delete b[c] // no
        },
        
    // No function like this
    removeMarker: function(a) {
        var b = this.data("gmap").markers,
            c = this.data("gmap").markerKeys,
            d = b.indexOf(a);
        d !== -1 && (b[d].setMap(null), delete b[d], b.splice(d, 1));
        for (d in c) c[d] === a && delete c[d]
    },
        
    getMarker: function(a) {
        return this.data("gmap").markerKeys[a]
    },
        
    fixAfterResize: function(a) {
        var b = this.data("gmap");
        c.event.trigger(b.gmap, "resize"), a && b.gmap.panTo(new google.maps.LatLng(0, 0)), b.gmap.panTo(this.gMap("_getMapCenter", b.opts))
    },
        
    setZoom: function(a, b, c) {
        var d = this.data("gmap").gmap;
        "fit" === a && (a = g._autoZoom.apply(this, [b, c])), d.setZoom(parseInt(a))
    },
        
    // bit difference
    changeSettings: function(a) {
        var b = this.data("gmap");
        void 0 === a.markers ? a.markers = g._convertMarkers(b.markers) : 0 !== a.markers.length && void 0 === a.markers[0].latitude && (a.markers = g._convertMarkers(a.markers)), 
        
        a.zoom && g.setZoom.apply(this, [a.zoom, a]),           
        (a.latitude || a.longitude) && b.gmap.panTo(g._getMapCenter.apply(this, [a]))
    },
        
    mapclick: function(a) {
            google.maps.event.addListener(this.data("gmap").gmap, "click", function(b) {
                a(b.latLng)
            })
        },
    
    geocode: function(a, b, e) {
            d.geocode({
                address: a
            }, function(a, d) {
                d === c.GeocoderStatus.OK ? b(a[0].geometry.location) : e && e(a, d)
            })
        },
        
    getRoute: function(b) {
            var d = this.data("gmap"),
                e = d.gmap,
                f = new c.DirectionsRenderer,
                g = new c.DirectionsService,
                h = {
                    BYCAR: c.DirectionsTravelMode.DRIVING,
                    BYBICYCLE: c.DirectionsTravelMode.BICYCLING,
                    BYFOOT: c.DirectionsTravelMode.WALKING
                },
                i = {
                    MILES: c.DirectionsUnitSystem.IMPERIAL,
                    KM: c.DirectionsUnitSystem.METRIC
                },
                j = null,
                k = null,
                l = null;
            void 0 !== b.routeDisplay ? j = b.routeDisplay instanceof jQuery ? b.routeDisplay[0] : "string" == typeof b.routeDisplay ? a(b.routeDisplay)[0] : null : null !== d.opts.routeFinder.routeDisplay && (j = d.opts.routeFinder.routeDisplay instanceof jQuery ? d.opts.routeFinder.routeDisplay[0] : "string" == typeof d.opts.routeFinder.routeDisplay ? a(d.opts.routeFinder.routeDisplay)[0] : null), f.setMap(e), null !== j && f.setPanel(j), k = void 0 !== h[d.opts.routeFinder.travelMode] ? h[d.opts.routeFinder.travelMode] : h.BYCAR, l = void 0 !== i[d.opts.routeFinder.travelUnit] ? i[d.opts.routeFinder.travelUnit] : i.KM;
            var n = {
                origin: b.from,
                destination: b.to,
                travelMode: k,
                unitSystem: l
            };
            return g.route(n, function(b, e) {
                e == c.DirectionsStatus.OK ? f.setDirections(b) : null !== j && a(j).html(d.opts.routeFinder.routeErrors[e])
            }), this
        }
    },
    
    a.fn.gMap = function(b) {
        return g[b] ? g[b].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof b && b ? void a.error("Method " + b + " does not exist on jQuery.gmap") : g.init.apply(this, arguments)
    },
    
    a.fn.gMap.defaults = {
        log: !1,
        address: "",
        latitude: null,
        longitude: null,
        zoom: 3,
        maxZoom: null,
        minZoom: null,
        markers: [],
        controls: {},
        scrollwheel: !0,
        maptype: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: !0,
        zoomControl: !0,
        panControl: !1,
        scaleControl: !1,
        streetViewControl: !0,
        controlsPositions: {
            mapType: null,
            zoom: null,
            pan: null,
            scale: null,
            streetView: null
        },
        controlsStyle: {
            mapType: google.maps.MapTypeControlStyle.DEFAULT,
            zoom: google.maps.ZoomControlStyle.DEFAULT
        },
        singleInfoWindow: !0,
        html_prepend: '<div class="gmap_marker">',
        html_append: "</div>",
        icon: {
            image: "http://www.google.com/mapfiles/marker.png",
            iconsize: [20, 34],
            iconanchor: [9, 34],
            infowindowanchor: [0, 0],
            shadow: "http://www.google.com/mapfiles/shadow50.png",
            shadowsize: [37, 34],
            shadowanchor: [9, 34]
        },
        onComplete: function() {},
        routeFinder: {
            travelMode: "BYCAR",
            travelUnit: "KM",
            routeDisplay: null,
            routeErrors: {
                INVALID_REQUEST: "The provided request is invalid.",
                NOT_FOUND: "One or more of the given addresses could not be found.",
                OVER_QUERY_LIMIT: "A temporary error occured. Please try again in a few minutes.",
                REQUEST_DENIED: "An error occured. Please contact us.",
                UNKNOWN_ERROR: "An unknown error occured. Please try again.",
                ZERO_RESULTS: "No route could be found within the given addresses."
            }
        },
        clustering: {
            enabled: !1,
            fastClustering: !1,
            clusterCount: 10,
            clusterSize: 40
        },
        extra: {}
    }
}(jQuery);
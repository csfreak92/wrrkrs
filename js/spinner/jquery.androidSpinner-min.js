(function(e){function s(){var e=new Date;var n=(e.getTime()-t)/1e3;t=e;i.top.currentRotation+=i.top.rotationRate*n;i.bottom.currentRotation+=i.bottom.rotationRate*n;i.top.currentRotation%=2*Math.PI;i.bottom.currentRotation%=2*Math.PI;o();requestAnimationFrame(function(){s()})}function o(){n.width=n.width;for(c in i){r.lineWidth=i[c].lineWidth;for(var e=0;e<i[c].steps;e++){r.beginPath();r.strokeStyle="rgba("+i[c].colorData.r+","+i[c].colorData.g+","+i[c].colorData.b+","+i[c].alphaTable[e]+")";var t=i[c].direction*(e/i[c].steps*2*Math.PI+i[c].currentRotation);var s=t+1/i[c].steps*2*Math.PI;r.arc(i[c].x,i[c].y,i[c].radius,t,s);r.stroke()}}}var t=new Date;var n=document.createElement("canvas");var r=n.getContext("2d");var i={top:{alphaTable:[],color:"",colorData:{r:0,g:0,b:0},currentRotation:0,direction:1,gradientRange:[.05,.8],lineWidth:10,radius:1,rotation:0,rotationRate:6,smoothing:1+Number.MIN_VALUE,steps:64,x:50,y:50},bottom:{alphaTable:[],color:"",colorData:{r:0,g:0,b:0},currentRotation:0,direction:-1,gradientRange:[0,1],lineWidth:10,radius:1,rotation:0,rotationRate:5,smoothing:1+Number.MIN_VALUE,steps:64,x:50,y:50}};e.fn.ajaxLoader=function(t){var r=e.extend({size:30,lineWidth:4,top:{color:"rgb(233, 233, 233)",direction:1,gradientRange:[.05,.8],rotationRate:4,steps:64},bottom:{color:"rgb(233, 233, 233)",direction:-1,gradientRange:[0,1],rotationRate:4,steps:64}},t);r.top.color=e(document.createElement("div")).css("color",r.top.color).css("color");var o=r.top.color.match(/(?:(?:rgb\()\s*(\d*\.?\d*%?)\s*,\s*(\d*\.?\d*%?)\s*,\s*(\d*\.?\d*%?)\s*\))/i);i.top.colorData.r=o[1];i.top.colorData.g=o[2];i.top.colorData.b=o[3];r.bottom.color=e(document.createElement("div")).css("color",r.bottom.color).css("color");o=r.bottom.color.match(/(?:(?:rgb\()\s*(\d*\.?\d*%?)\s*,\s*(\d*\.?\d*%?)\s*,\s*(\d*\.?\d*%?)\s*\))/i);i.bottom.colorData.r=o[1];i.bottom.colorData.g=o[2];i.bottom.colorData.b=o[3];if(this.width()==0)this.width(r.size);if(this.height()==0)this.height(r.size);i.top.radius=i.bottom.radius=t&&t.size?(r.size-r.lineWidth)/2-2:this.width()<this.height()?(this.width()-r.lineWidth)/2-2:(this.height()-r.lineWidth)/2-2;i.top.radius=i.top.radius<1?1:i.top.radius;i.bottom.radius=i.bottom.radius<1?1:i.bottom.radius;i.top.lineWidth=i.bottom.lineWidth=r.lineWidth;i.top.x=i.bottom.x=this.width()/2;i.top.y=i.bottom.y=this.height()/2;this.prepend(n);n.width=t&&t.size?t.size:this.width();n.height=t&&t.size?t.size:this.height();for(c in i){for(var u=0;u<=i[c].steps;u++){i[c].alphaTable.push(u/i[c].steps*(i[c].gradientRange[1]-i[c].gradientRange[0])+i[c].gradientRange[0])}}s();return this}})(jQuery)

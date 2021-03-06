<script >
	//-----------------------------------------
	banhji.Index = kendo.observable({
		lang     : langVM
	});
	banhji.tapMenu =  kendo.observable({
		lang     : langVM,
		goReports          : function(){
			banhji.router.navigate('/reports');
		},
		goCheckOut         : function(){
			banhji.router.navigate('/check_out');
		},
		goTransactions      : function(){
			banhji.router.navigate('/');
		},
		goPurchaseCenter        : function(){
			banhji.router.navigate('/purchase_center');
		},
	});
	banhji.reports = kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "micro_modules/purchases_reports_snapshot"),
		txnDS               : dataStore(apiUrl + "micro_modules/vendor_transaction_list"),
		sortList            : banhji.source.sortList,
		sorter              : "month",
		sdate               : "",
		edate               : "",
		obj                 : {},
		fiscalDate          : kendo.toString(new Date(banhji.userData.institute.fiscal_date),"m"),
		pageLoad            : function(){
			this.loadData();
			this.search();
		},
		loadData            : function(){
			var self = this;

			this.dataSource.query({
				filter: [],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.dataSource.view();

				self.set("obj", view[0]);
			});
		},
		sorterChanges       : function(){
			var today = new Date(),
			sdate = "",
			edate = "",
			sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

					break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

					break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

					break;
				case "year":
					this.set("sdate", new Date(today.getFullYear(), 0, 1));
					this.set("edate", new Date(today.getFullYear(), 11, 31));

					break;
				default:
					this.set("sdate", "");
					this.set("edate", "");
			}
		},
		search              : function(){
			var self = this, para = [],
				start = this.get("sdate"),
				end = this.get("edate"),
				displayDate = "";

			//Dates
			if(start && end){
				start = new Date(start);
				end = new Date(end);
				displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
				end.setDate(end.getDate()+1);

				para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
				para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
			}else if(start){
				start = new Date(start);
				displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

				para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
			}else if(end){
				end = new Date(end);
				displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
				end.setDate(end.getDate()+1);

				para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
			}else{

			}
			this.set("displayDate", displayDate);

			this.txnDS.filter(para);
		},
		loadPurchase            : function(){
			this.txnDS.filter(
				{ field:"type", operator:"where_in", value:["Cash_Purchase","Credit_Purchase"] }
			);
		},
		loadPayable            : function(){
			this.txnDS.filter([
				{ field:"type", value:"Credit_Purchase" },
				{ field:"status", operator:"where_in", value:[0,2] }
			]);
		},
		loadOverdue         : function(){
            this.txnDS.filter([
                { field:"type", value:"Credit_Purchase" },
                { field:"status", operator:"where_in", value:[0,2] },
                { field:"due_date <", value:kendo.toString(new Date(), "yyyy-MM-dd") }
            ]);
        },
		loadDraft            : function(){
			this.txnDS.filter([
				{ field:"type", operator:"where_in", value:["Purchase_Order","Vendor_Deposit","Cash_Payment","Payment_Refund","Cash_Purchase","Credit_Purchase"] },
				{ field:"status", value:4 },
				{ field:"progress", value:"Draft" }
			]);
		},
		payBill             : function(e){
			var data = e.data;

			if(obj!==null){
				banhji.router.navigate('/cash_payment');
				banhji.cashPayment.loadInvoice(data.id);
			}
		}
	});
	banhji.transactions = kendo.observable({
		// lang                : langVM,
		// dataSource          : dataStore(apiUrl + "vendorReports/transaction_vendor_grid"),
		// contactDS           : banhji.source.supplierDS,
		// sortList            : banhji.source.sortList,
		// sorter              : "month",
		// sdate               : "",
		// edate               : "",
		// obj                 : { contactIds: [] },
		// company             : banhji.institute,
		// displayDate         : "",
		// totalCustomer       : 0,
		// totalSale           : 0,
		// totalBalance        : 0,
		// exArray             : [],
		// pageLoad            : function(){
		//     this.search();
		// },
		// sorterChanges       : function(){
		//     var today = new Date(),
		//     sdate = "",
		//     edate = "",
		//     sorter = this.get("sorter");

		//     switch(sorter){
		//         case "today":
		//             this.set("sdate", today);
		//             this.set("edate", "");

		//             break;
		//         case "week":
		//             var first = today.getDate() - today.getDay(),
		//             last = first + 6;

		//             this.set("sdate", new Date(today.setDate(first)));
		//             this.set("edate", new Date(today.setDate(last)));

		//             break;
		//         case "month":
		//             this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
		//             this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

		//             break;
		//         case "year":
		//             this.set("sdate", new Date(today.getFullYear(), 0, 1));
		//             this.set("edate", new Date(today.getFullYear(), 11, 31));

		//             break;
		//         default:
		//             this.set("sdate", "");
		//             this.set("edate", "");
		//     }
		// },
		// search              : function(){
		//     var self = this, para = [],
		//         obj = this.get("obj"),
		//         start = this.get("sdate"),
		//         end = this.get("edate"),
		//         displayDate = "";

		//     //Customer
		//     if(obj.contactIds.length>0){
		//         var contactIds = [];
		//         $.each(obj.contactIds, function(index, value){
		//             contactIds.push(value);
		//         });
		//         para.push({ field:"contact_id", operator:"where_in", value:contactIds });
		//     }

		//     //Dates
		//     if(start && end){
		//         start = new Date(start);
		//         end = new Date(end);
		//         displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
		//         end.setDate(end.getDate()+1);

		//         para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
		//         para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
		//     }else if(start){
		//         start = new Date(start);
		//         displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

		//         para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
		//     }else if(end){
		//         end = new Date(end);
		//         displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
		//         end.setDate(end.getDate()+1);

		//         para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
		//     }else{

		//     }
		//     this.set("displayDate", displayDate);

		//     this.dataSource.filter(para);
		// },
		// payBill             : function(e){
		//     var data = e.data;

		//     if(obj!==null){
		//         banhji.router.navigate('/cash_payment');
		//         banhji.cashPayment.loadInvoice(data.id);
		//     }
		// }
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "transactions"),
		lineDS              : dataStore(apiUrl + "item_lines"),
		assemblyLineDS      : dataStore(apiUrl + "item_lines"),
		txnDS               : dataStore(apiUrl + "transactions"),
		numberDS            : dataStore(apiUrl + "transactions/number"),
		balanceDS           : dataStore(apiUrl + "transactions/balance"),
		journalLineDS       : dataStore(apiUrl + "journal_lines"),
		recurringDS         : dataStore(apiUrl + "transactions"),
		recurringLineDS     : dataStore(apiUrl + "item_lines"),
		referenceDS         : dataStore(apiUrl + "transactions"),
		referenceLineDS     : dataStore(apiUrl + "item_lines"),
		depositDS           : dataStore(apiUrl + "transactions"),
		wacDS               : dataStore(apiUrl + "items/weighted_average_costing"),
		itemDS              : dataStore(apiUrl + "items"),
		itemPriceDS         : dataStore(apiUrl + "item_prices"),
		assemblyDS          : dataStore(apiUrl + "item_assemblies"),
		attachmentDS        : dataStore(apiUrl + "attachments"),
		segmentDS           : dataStore(apiUrl + "segments"),
		segItemDS           : dataStore(apiUrl + "segments/item"),
		segmentItemDS       : dataStore(apiUrl + "segments/item"),      
		typeList            : new kendo.data.DataSource({
			data: banhji.source.prefixList,
			filter:{
				logic: "or",
				filters: [
					{ field: "type", value: "Commercial_Invoice" },
					{ field: "type", value: "Vat_Invoice" },
					{ field: "type", value: "Invoice" }
				]
			}
		}),
		contactDS          : new kendo.data.DataSource({
			transport: {
				read: {
					url: apiUrl + "contacts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if (operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {
							models: kendo.stringify(options.models)
						};
					}
				}
			},
			schema: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			filter:{ field:"parent_id", operator:"where_related_contact_type", value:1 },
			sort: {
				field: "id",
				dir: "asc"
			},
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page: 1,
			pageSize: 100
		}),
		categoryDS         : new kendo.data.DataSource({
			transport: {
				read: {
					url: apiUrl + "categories",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if (operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {
							models: kendo.stringify(options.models)
						};
					}
				}
			},
			schema: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			filter: [
				{
					field: "is_system",
					value: 0
				}
			],
			sort: {
				field: "id",
				dir: "asc"
			},
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page: 1,
			pageSize: 100
		}),        
		discountAccountDS   : new kendo.data.DataSource({
			data: banhji.source.accountList,
			filter: { field:"id", value: 72 },
			sort: { field:"number", dir:"asc" }
		}),
		txnTemplateDS       : new kendo.data.DataSource({
			data: banhji.source.txnTemplateList,
			filter:{
				logic: "or",
				filters: [
					{ field: "type", value: "Commercial_Invoice" },
					{ field: "type", value: "Vat_Invoice" },
					{ field: "type", value: "Invoice" }
				]
			}
		}),
		jobDS               : new kendo.data.DataSource({
			data: banhji.source.jobList,
			sort: { field: "name", dir: "asc" }
		}),
		itemsDS             : new kendo.data.DataSource({
			transport: {
				read: {
					url: apiUrl + "items",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if (operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {
							models: kendo.stringify(options.models)
						};
					}
				}
			},
			schema: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			filter: [
				{
					field: "item_type_id",
					operator: "where_in",
					value: [1, 4]
				}
			],
			sort: {
				field: "id",
				dir: "asc"
			},
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page: 1,
			pageSize: 8
		}),
		employeeDS          : new kendo.data.DataSource({
			transport: {
				read: {
					url: apiUrl + "contacts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if (operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {
							models: kendo.stringify(options.models)
						};
					}
				}
			},
			schema: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			filter: [
				{
					field: "contact_type_id",
					operator: "where_in",
					value: [11,12]
				},
				{   
					field: "work_id",
					value: 0
				}
			],
			sort: {
				field: "id",
				dir: "asc"
			},
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page: 1,
			pageSize: 100
		}),
		itemGroupDS         : banhji.source.itemGroupDS,
		statusObj           : banhji.source.statusObj,
		paymentTermDS       : banhji.source.paymentTermDS,
		paymentMethodDS     : banhji.source.paymentMethodDS,
		amtDueColor         : banhji.source.amtDueColor,
		confirmMessage      : banhji.source.confirmMessage,
		dateUnitList       : banhji.source.dateUnitList,
		monthOptionList     : banhji.source.monthOptionList,
		monthList           : banhji.source.monthList,
		weekDayList         : banhji.source.weekDayList,
		dayList             : banhji.source.dayList,
		showMonthOption     : false,
		showMonth           : false,
		showWeek            : false,
		showDay             : false,
		obj                 : null,
		isEdit              : false,
		saveDraft           : false,
		saveClose           : false,
		savePrint           : false,
		saveRecurring       : false,
		showConfirm         : false,
		notDuplicateNumber  : true,
		recurring           : "",
		recurring_validate  : false,
		reference_id        : 0,
		balance             : 0,
		total_deposit       : 0,
		total               : 0,
		amount_due          : 0,
		segment_id          : "",
		segmentitem_id      : "",
		barcode             : "",
		barcodeVisible      : false,
		category_id         : 0,
		item_group_id       : 0,
		user_id             : banhji.source.user_id,
		sessionDS           : dataStore(apiUrl + "cashier"),
		haveItems           : false,
		currencyDS: dataStore(apiUrl + "utibills/currency"),
		searchItemByCategory: function(e){
			var data = e.data;
			var self = this;
			$("#loading").css("display", "block");
			this.itemsDS.query({
				filter: {field: "category_id", value: data.id},
				page: 1,
				pageSize: 8,
			}).then(function(e){
				$("#loading").css("display", "none");
				if(self.itemsDS.data().length > 0){
					self.set("haveItems", true);
				}else{
					alert('មិនមានទិន្ន័យ (No Data)!');
				}
			});
		},
	});
	// Function
	banhji.purchaseCenter = kendo.observable({
		lang                : langVM,
		transactionDS       : dataStore(apiUrl + 'transactions'),
		snapshotDS 		    : dataStore(apiUrl + 'micro_modules/purchases_center_snapshot'),		
		noteDS              : dataStore(apiUrl + 'notes'),
		attachmentDS        : dataStore(apiUrl + "attachments"),
		txnDS               : dataStore(apiUrl + "transactions"),
		contactTypeDS       : new kendo.data.DataSource({
			data: banhji.source.contactTypeList,
			filter: { field:"parent_id", value: 2 }//Supplier
		}),
		contactDS           : banhji.source.supplierDS,
		sortList            : banhji.source.sortList,
		sorter              : "all",
		sdate               : "",
		edate               : "",
		obj                 : null,
		snapshot			: [],
		note                : "",
		searchText          : "",
		contact_type_id     : null,
		balance             : 0,
		po                  : 0,
		openInvoice         : 0,
		overInvoice         : 0,
		currencyCode        : "",
		user_id             : banhji.source.user_id,
		pageLoad            : function(id){
			if(id){
				this.loadObj(id);
			}

			//Refresh
			if(this.contactDS.total()>0){
				this.contactDS.fetch();
				this.searchTransaction();
				this.loadSummary();
			}
		},
		sorterChanges       : function(){
			var today = new Date(),
			sdate = "",
			edate = "",
			sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

					break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

					break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

					break;
				case "year":
					this.set("sdate", new Date(today.getFullYear(), 0, 1));
					this.set("edate", new Date(today.getFullYear(), 11, 31));

					break;
				default:
					this.set("sdate", "");
					this.set("edate", "");
			}
		},
		setCurrencyCode     : function(){
			var code = "", obj = this.get("obj");

			$.each(banhji.source.currencyDS.data(), function(index, value){
				if(value.locale == obj.locale){
					code = value.code;

					return false;
				}
			});

			this.set("currencyCode", code);
		},
		loadObj             : function(id){
			var self = this;

			this.contactDS.query({
				filter: { field:"id", value:id },
				page:1,
				pageSize:100
			}).then(function(){
				var view = self.contactDS.view();

				if(view.length>0){
					self.set("obj", view[0]);
					self.loadData();
				}
			});
		},
		loadData            : function(){
			var obj = this.get("obj");

			if(obj!==null){
				this.searchTransaction();
				this.loadSummary();
				this.setCurrencyCode();

				this.attachmentDS.query({
					filter:{ field:"contact_id", value: obj.id },
					page: 1,
					pageSize:10
				});
				this.noteDS.query({
					filter: { field:"contact_id", value: obj.id },
					sort: { field:"noted_date", dir:"desc" },
					page: 1,
					pageSize: 10
				});
			}
		},
		//Upload
		onSelect            : function(e){
			// Array with information about the uploaded files
			var self = this,
			files = e.files,
			obj = this.get("obj");

			if(obj!==null){
				// Check the extension of each file and abort the upload if it is not .jpg
				$.each(files, function(index, value){
					if (value.extension.toLowerCase() === ".jpg"
						|| value.extension.toLowerCase() === ".jpeg"
						|| value.extension.toLowerCase() === ".tiff"
						|| value.extension.toLowerCase() === ".png"
						|| value.extension.toLowerCase() === ".gif"
						|| value.extension.toLowerCase() === ".pdf"){

						var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

						self.attachmentDS.add({
							user_id         : self.get("user_id"),
							contact_id      : obj.id,
							type            : "Contact",
							name            : value.name,
							description     : "",
							key             : key,
							url             : banhji.s3 + key,
							size            : value.size,
							created_at      : new Date(),

							file            : value.rawFile
						});
					}else{
						alert("This type of file is not allowed to attach.");
					}
				});
			}else{
				alert("Please select a supplier!");
			}
		},
		removeFile          : function(e){
			var data = e.data;

			if (confirm(banhji.source.confirmMessage)) {
				this.attachmentDS.remove(data);
				this.attachmentDS.sync();
			}
		},
		uploadFile          : function(){
			$.each(this.attachmentDS.data(), function(index, value){
				if(!value.id){
					var params = {
						Body: value.file,
						Key: value.key
					};
					bucket.upload(params, function (err, data) {
						// console.log(err, data);
						// var url = data.Location;
					});
				}
			});

			this.attachmentDS.sync();
			var saved = false;
			this.attachmentDS.bind("requestEnd", function(e){
				//Delete File
				if(e.type=="destroy"){
					if(saved==false && e.response){
						saved = true;

						var response = e.response.results;
						$.each(response, function(index, value){
							var params = {
								//Bucket: 'STRING_VALUE', /* required */
								Delete: { /* required */
									Objects: [ /* required */
										{
											Key: value.data.key /* required */
										}
									  /* more items */
									]
								}
							};
							bucket.deleteObjects(params, function(err, data) {
								//console.log(err, data);
							});
						});
					}
				}
			});
		},
		//Obj
		loadContact         : function(id){
			var self = this;

			this.contactDS.query({
				filter:[
					{ field:"id", value:id }
				],
				page: 1,
				pageSize: 50
			}).then(function(e) {
				var view = self.contactDS.data();

				if(view.length>0){
					self.set("obj", view[0]);
					self.loadData();
				}
			});
		},
		loadSummary         : function(){
			var self = this, obj = this.get("obj");

			if(obj!==null){
				this.snapshotDS.query({
					filter: { field:"contact_id", value: obj.id }
				}).then(function(){
					var view = self.snapshotDS.view();

					self.set("snapshot", view[0]);
				});
			}
		},
		loadBalance         : function(){
			var obj = this.get("obj");

			if(obj!==null){
				this.transactionDS.query({
					filter: [
						{ field:"contact_id", value: obj.id },
						{ field:"type", value:"Credit_Purchase" },
						{ field:"status", operator:"where_in", value: [0,2] }
					],
					sort: [
						{ field: "issued_date", dir: "desc" },
						{ field: "id", dir: "desc" }
					],
					page: 1,
					pageSize: 10
				});
			}
		},
		loadPO              : function(){
			var obj = this.get("obj");

			if(obj!==null){
				this.transactionDS.query({
					filter: [
						{ field:"contact_id", value: obj.id },
						{ field:"type", value:"Purchase_Order" },
						{ field:"status", value: 0 }
					],
					sort: [
						{ field: "issued_date", dir: "desc" },
						{ field: "id", dir: "desc" }
					],
					page: 1,
					pageSize: 10
				});
			}
		},
		loadOverInvoice     : function(){
			var obj = this.get("obj");

			if(obj!==null){
				this.transactionDS.query({
					filter: [
						{ field:"contact_id", value: obj.id },
						{ field:"type", value: "Credit_Purchase" },
						{ field:"status", operator:"where_in", value: [0,2] },
						{ field:"due_date <", value: kendo.toString(new Date(), "yyyy-MM-dd") }
					],
					sort: [
						{ field: "issued_date", dir: "desc" },
						{ field: "id", dir: "desc" }
					],
					page: 1,
					pageSize: 10
				});
			}
		},
		selectedRow         : function(e){
			var data = e.data;

			this.set("obj", data);
			this.loadData();
		},
		//Search
		enterSearch         : function(e){
			e.preventDefault();

			this.search();
		},
		search              : function(){
			var self = this,
			para = [],
			searchText = this.get("searchText"),
			contact_type_id = this.get("contact_type_id");

			if(searchText){
				//Phone
				if(this.phonenumber(searchText)){
					para.push({ field: "phone", operator: "contains", value: searchText });
				}else{
					var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);
					if(textParts.length===2){
						if(textParts[0]!=="" && textParts[1]!==""){
							para.push({ field: "abbr", value: textParts[0] });
							para.push({ field: "number", value: textParts[1] });
						}else{
							para.push({ field: "name", operator: "contains", value: searchText });
						}
					}else{
						para.push({ field: "name", operator: "contains", value: searchText });
					}
				}
			}

			if(contact_type_id){
				para.push({ field: "contact_type_id", value: contact_type_id });
			}else{
				para.push({ field: "parent_id", operator:"where_related_contact_type", value: 2 });
			}

			this.contactDS.filter(para);

			//Clear search filters
			self.set("searchText", "");
			self.set("contact_type_id", 0);
		},
		searchTransaction   : function(){
			var self = this,
				start = this.get("sdate"),
				end = this.get("edate"),
				para = [], obj = this.get("obj");

			if(obj!==null){
				para.push({ field:"contact_id", value: obj.id });

				//Dates
				if(start && end){
					start = new Date(start);
					end = new Date(end);
					end.setDate(end.getDate()+1);

					para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
					para.push({ field:"issued_date <=", value: kendo.toString(end, "yyyy-MM-dd") });
				}else if(start){
					start = new Date(start);
					para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
				}else if(end){
					end = new Date(end);
					end.setDate(end.getDate()+1);
					para.push({ field:"issued_date <=", value: kendo.toString(end, "yyyy-MM-dd") });
				}else{}

				this.transactionDS.query({
					filter: para,
					sort: [
						{ field: "issued_date", dir: "desc" },
						{ field: "id", dir: "desc" }
					],
					page: 1,
					pageSize: 10
				});
			}
		},
		phonenumber         : function (inputtxt){
			var phoneno = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
			if(inputtxt.match(phoneno)){
				return true;
			}else{
				return false;
			}
		},
		//Links
		goEdit              : function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/vendor/'+obj.id);
			}
		},
		goReference         : function(e){
			var self = this, data = e.data;

			this.txnDS.query({
				filter:{ field:"id", value:data.reference_id}
			}).then(function(){
				var view = self.txnDS.view();

				banhji.router.navigate('/' + view[0].type.toLowerCase() +'/'+ data.reference_id);
			});
		},
		goPO                : function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/purchase_order');
				banhji.purchaseOrder.setContact(obj);
			}
		},
		goDeposit           : function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/vendor_deposit');
				banhji.vendorDeposit.setContact(obj);
			}
		},
		goPurchase          : function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/purchase');
				banhji.purchase.setContact(obj);
			}
		},
		goPurchaseReturn    : function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/purchase_return');
				banhji.purchaseReturn.setContact(obj);
			}
		},
		goGRN               : function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/grn');
				banhji.grn.setContact(obj);
			}
		},
		goCashPayment       : function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/cash_payment');
				banhji.cashPayment.loadContact(obj.id);
			}
		},
		goPaymentRefund     : function(){
			var obj = this.get("obj");

			if(obj!==null){
				banhji.router.navigate('/payment_refund');
				banhji.paymentRefund.setContact(obj);
			}
		},
		payBill             : function(e){
			var data = e.data;

			if(obj!==null){
				banhji.router.navigate('/cash_payment');
				banhji.cashPayment.loadInvoice(data.id);
			}
		},
		//Note
		saveNoteEnter       : function(e){
			e.preventDefault();
			this.saveNote();
		},
		saveNote            : function(){
			var obj = this.get("obj");

			if(obj!==null && this.get("note")!==""){
				this.noteDS.insert(0, {
					contact_id  : obj.id,
					note        : this.get("note"),
					noted_date  : new Date(),
					created_by  : this.get("user_id"),

					creator     : ""
				});

				this.noteDS.sync();
				this.set("note", "");
			}else{
				alert("Please select a supplier and Memo is required");
			}
		}
	});
	

	// VENDOR FUNCTIONS
	banhji.vendor = kendo.observable({
		lang                    : langVM,
		dataSource              : dataStore(apiUrl + "contacts"),
		attachmentDS            : dataStore(apiUrl + "attachments"),
		patternDS               : dataStore(apiUrl + "contacts"),
		numberDS                : dataStore(apiUrl + "contacts"),
		deleteDS                : dataStore(apiUrl + "transactions"),
		existingDS              : dataStore(apiUrl + "contacts"),
		contactPersonDS         : dataStore(apiUrl + "contact_persons"),
		paymentTermDS           : banhji.source.paymentTermDS,
		paymentMethodDS         : banhji.source.paymentMethodDS,
		countryDS               : banhji.source.countryDS,
		currencyDS              : new kendo.data.DataSource({
			data: banhji.source.currencyList,
			filter: { field:"status", value: 1 }
		}),
		contactTypeDS           : new kendo.data.DataSource({
			data: banhji.source.contactTypeList,
			filter: { field:"parent_id", value: 2 }//Supplier
		}),
		apDS                    : new kendo.data.DataSource({
			data: banhji.source.accountList,
			filter: {
				logic: "or",
				filters: [
					{ field: "account_type_id", value: 23 },
					{ field: "account_type_id", value: 24 }
				]
			},
			sort: { field:"number", dir:"asc" }
		}),
		prepaidAccountDS        : new kendo.data.DataSource({
			data: banhji.source.accountList,
			filter: {
				logic: "or",
				filters: [
					{ field: "account_type_id", value: 14 },
					{ field: "account_type_id", value: 21 }
				]
			},
			sort: { field:"number", dir:"asc" }
		}),
		tradeDiscountDS         : new kendo.data.DataSource({
			data: banhji.source.accountList,
			filter: {
				logic: "or",
				filters: [
					{ field: "account_type_id", value: 36 },
					{ field: "account_type_id", value: 37 },
					{ field: "account_type_id", value: 38 },
					{ field: "account_type_id", value: 40 },
					{ field: "account_type_id", value: 41 },
					{ field: "account_type_id", value: 42 },
					{ field: "account_type_id", value: 43 }
				]
			},
			sort: { field:"number", dir:"asc" }
		}),
		settlementDiscountDS    : new kendo.data.DataSource({
			data: banhji.source.accountList,
			// filter:{ field:"id", value: 109 },
			filter: {
				logic: "or",
				filters: [
					{ field: "account_type_id", value: 36 },
					{ field: "account_type_id", value: 37 },
					{ field: "account_type_id", value: 38 },
					{ field: "account_type_id", value: 39 },
					{ field: "account_type_id", value: 40 },
					{ field: "account_type_id", value: 41 },
					{ field: "account_type_id", value: 42 },
					{ field: "account_type_id", value: 43 }
				]
			},
			sort: { field:"number", dir:"asc" }
		}),
		taxItemDS       		: new kendo.data.DataSource({
			data: banhji.source.taxList,
			sort: [
				{ field: "tax_type_id", dir: "asc" },
				{ field: "name", dir: "asc" }
			]
		}),
		genders                 : banhji.source.genderList,
		statusList              : banhji.source.statusList,
		confirmMessage          : banhji.source.confirmMessage,
		isEdit                  : false,
		isProtected             : false,
		obj                     : null,
		saveClose               : false,
		showConfirm             : false,
		notDuplicateNumber      : true,
		phFullname              : "Supplier Name ...",
		contact_type_id         : 0,
		pageLoad                : function(id, contact_type_id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id, contact_type_id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Contact Person
		addEmptyContactPerson   : function(){
			var obj = this.get("obj");

			this.contactPersonDS.add({
				contact_id          : obj.id,
				prefix              : "",
				name                : "",
				department          : "",
				phone               : "",
				email               : ""
			});
		},
		deleteContactPerson     : function(e){
			if (confirm("Are you sure, you want to delete it?")) {
				var d = e.data,
				obj = this.contactPersonDS.getByUid(d.uid);

				this.contactPersonDS.remove(obj);
			}
		},
		copyBillTo              : function(){
			var obj = this.get("obj");

			obj.set("ship_to", obj.bill_to);
		},
		//Number
		checkExistingNumber     : function(){
			var self = this, para = [],
			obj = this.get("obj");

			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}

				para.push({ field:"abbr", value: obj.abbr });
				para.push({ field:"number", value: obj.number });
				para.push({ field:"contact_type_id", value: obj.contact_type_id });

				this.existingDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.existingDS.view();

					if(view.length>0){
						self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber          : function(){
			var self = this, obj = this.get("obj");

			this.numberDS.query({
				filter:[
					{ field:"contact_type_id", value:obj.contact_type_id }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.numberDS.view();

				var lastNo = 0;
				if(view.length>0){
					lastNo = kendo.parseInt(view[0].number);
				}
				lastNo++;
				obj.set("number",kendo.toString(lastNo, "00000"));
			});
		},
		checkExistingTxn        : function(){
			var self = this, obj = this.get("obj");

			this.deleteDS.query({
				filter: { field:"contact_id", value: obj.id },
				page: 1,
				pageSize: 1
			}).then(function(e){
				var view = self.deleteDS.view();

				if(view.length>0){
					self.set("isProtected", true);
				}else{
					self.set("isProtected", false);
				}
			});
		},
		//Obj
		loadObj                 : function(id, contact_type_id){
			var self = this, para = [];

			if(id>0){
				para.push({ field:"id", value: id });
			}

			if(contact_type_id){
				para.push({ field:"contact_type_id", value: contact_type_id });
				para.push({ field:"is_pattern", value: 1 });
			}

			this.dataSource.query({
				filter: para,
				page: 1,
				pageSize: 100
			}).then(function(e){
				var view = self.dataSource.view();

				self.set("obj", view[0]);
				self.loadMap();
				self.checkExistingTxn();
			});
		},
		//Upload
		onSelect                : function(e){
			// Array with information about the uploaded files
			var self = this,
			files = e.files[0],
			obj = this.get("obj");

			var fileReader = new FileReader();
			fileReader.onload = function (event) {
				var mapImage = event.target.result;
				self.obj.set('image_url', mapImage);
			}
			fileReader.readAsDataURL(files.rawFile);

			// Check the extension of each file and abort the upload if it is not .jpg
			if (files.extension.toLowerCase() === ".jpg"
				|| files.extension.toLowerCase() === ".jpeg"
				|| files.extension.toLowerCase() === ".tiff"
				|| files.extension.toLowerCase() === ".png"
				|| files.extension.toLowerCase() === ".gif"){

				if(this.attachmentDS.total()>0){
					var att = this.attachmentDS.at(0);
					this.attachmentDS.remove(att);
				}

				var key = 'ITEM_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

				this.attachmentDS.add({
					user_id         : this.get("user_id"),
					item_id         : obj.id,
					type            : "Item",
					name            : files.name,
					description     : "",
					key             : key,
					url             : banhji.s3 + key,
					size            : files.size,
					created_at      : new Date(),

					file            : files.rawFile
				});
			}else{
				alert("This type of file is not allowed to attach.");
			}
		},
		saveAttachment          : function(){
			$.each(this.attachmentDS.data(), function(index, value){
				if(!value.id){
					var params = {
						Body: value.file,
						Key: value.key
					};
					bucket.upload(params, function (err, data) {
						// console.log(err, data);
						// var url = data.Location;
					});
				}
			});

			this.attachmentDS.sync();
			var saved = false;
			this.attachmentDS.bind("requestEnd", function(e){
				//Delete File
				if(e.type=="destroy"){
					if(saved==false && e.response){
						saved = true;

						var response = e.response.results;
						$.each(response, function(index, value){
							var params = {
								//Bucket: 'STRING_VALUE', /* required */
								Delete: { /* required */
									Objects: [ /* required */
										{
											Key: value.data.key /* required */
										}
									  /* more items */
									]
								}
							};
							bucket.deleteObjects(params, function(err, data) {
								//console.log(err, data);
							});
						});
					}
				}
			});
		},
		addEmpty                : function(){
			this.dataSource.data([]);
			this.contactPersonDS.data([]);

			this.set("isEdit", false);
			this.set("isProtected", false);
			this.set("notDuplicateNumber", true);
			this.set("obj", null);

			this.dataSource.insert(0, {
				"country_id"            : 0,
				"user_id"               : 0,
				"contact_type_id"       : 6,
				"abbr"                  : "",
				"number"                : "",
				"surname"               : "",
				"name"                  : "",
				"gender"                : "M",
				"dob"                   : "",
				"phone"                 : "",
				"email"                 : "",
				"company"               : "",
				"vat_no"                : "",
				"memo"                  : "",
				"city"                  : "",
				"post_code"             : "",
				"address"               : "",
				"bill_to"               : "",
				"ship_to"               : "",
				"latitute"              : "",
				"longtitute"            : "",
				"credit_limit"          : 0,
				"locale"                : banhji.locale,
				"payment_term_id"       : 0,
				"payment_method_id"     : 0,
				"registered_date"       : new Date(),
				"account_id"            : 0,
				"ra_id"                 : 0,
				"tax_item_id"           : 0,
				"deposit_account_id"    : 0,
				"trade_discount_id"     : 0,
				"settlement_discount_id": 0,
				"is_pattern"            : 0,
				"status"                : 1,
				"image_url"             : banhji.no_image
			});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.typeChanges();
		},
		objSync                 : function(){
			var dfd = $.Deferred();

			this.dataSource.sync();
			this.dataSource.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		},
		save                    : function(){
			var self = this, obj = this.get("obj");

			//Edit Mode
			if(this.get("isEdit")){
				//Contact Person has changes
				if(this.contactPersonDS.hasChanges()){
					obj.set("dirty", true);
				}
			}

			//Attachment
			if(this.attachmentDS.total()>0){
				var att = this.attachmentDS.at(0);
				obj.set("image_url", att.url);
			}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Contact Person
					$.each(self.contactPersonDS.data(), function(index, value) {
						value.set("contact_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
						value.set("item_id", data[0].id);
					});
				}
				self.contactPersonDS.sync();
				self.saveAttachment();

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveClose")){
					//Save Close
					self.set("saveClose", false);
					self.cancel();
					window.history.back();
				}else{
					//Save New
					self.addEmpty();
				}

				banhji.source.loadSuppliers();
			});
		},
		cancel                  : function(){
			this.dataSource.cancelChanges();
			this.contactPersonDS.cancelChanges();
			this.dataSource.data([]);
			this.contactPersonDS.data([]);
			this.set("contact_type_id", 0);

			banhji.userManagement.removeMultiTask("vendor");
		},
		delete                  : function(){
			var obj = this.get("obj");
			this.set("showConfirm",false);

			if(!obj.is_system==1){
				if(this.get("isProtected")){
					alert("Sorry, this data is protected!");
				}else{
					obj.set("deleted", 1);
					this.dataSource.sync();

					window.history.back();
				}
			}
		},
		openConfirm             : function(){
			this.set("showConfirm", true);
		},
		closeConfirm            : function(){
			this.set("showConfirm", false);
		},
		//Pattern
		typeChanges             : function(){
			var obj = this.get("obj");

			if(obj.contact_type_id && obj.isNew()){
				this.applyPattern();
				this.generateNumber();
			}
		},
		applyPattern            : function(){
			var self = this, obj = self.get("obj");

			this.patternDS.query({
				filter: [
					{ field:"contact_type_id", value: obj.contact_type_id },
					{ field:"is_pattern", value: 1 }
				],
				page: 1,
				pageSize: 1
			}).then(function(data){
				var view = self.patternDS.view(),
					type = banhji.source.contactTypeDS.get(view[0].contact_type_id);

				if(view.length>0){
					obj.set("country_id", view[0].country_id);
					obj.set("abbr", type.abbr);
					obj.set("gender", view[0].gender);
					obj.set("company", view[0].company);
					obj.set("vat_no", view[0].vat_no);
					obj.set("memo", view[0].memo);
					obj.set("city", view[0].city);
					obj.set("post_code", view[0].post_code);
					obj.set("address", view[0].address);
					obj.set("bill_to", view[0].bill_to);
					obj.set("ship_to", view[0].ship_to);
					obj.set("payment_term_id", view[0].payment_term_id);
					obj.set("payment_method_id", view[0].payment_method_id);
					obj.set("credit_limit", view[0].credit_limit);
					obj.set("locale", view[0].locale);
					obj.set("account_id", view[0].account_id);
					obj.set("ra_id", view[0].ra_id);
					obj.set("tax_item_id", view[0].tax_item_id);
					obj.set("deposit_account_id", view[0].deposit_account_id);
					obj.set("trade_discount_id", view[0].trade_discount_id);
					obj.set("settlement_discount_id", view[0].settlement_discount_id);
				}
			});
		}
	});
	banhji.purchaseOrder =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "transactions"),
		lineDS              : dataStore(apiUrl + "item_lines"),
		txnDS               : dataStore(apiUrl + "transactions"),
		numberDS            : dataStore(apiUrl + "transactions/number"),
		recurringDS         : dataStore(apiUrl + "transactions"),
		recurringLineDS     : dataStore(apiUrl + "item_lines"),
		balanceDS           : dataStore(apiUrl + "transactions/balance"),
		itemDS              : dataStore(apiUrl + "items"),
		itemPriceDS         : dataStore(apiUrl + "item_prices"),
		attachmentDS        : dataStore(apiUrl + "attachments"),
		txnTemplateDS       : new kendo.data.DataSource({
			data: banhji.source.txnTemplateList,
			filter:{ field: "type", value: "Purchase_Order" }
		}),
		contactDS           : banhji.source.supplierDS,
		jobDS               : new kendo.data.DataSource({
			data: banhji.source.jobList,
			sort: { field: "name", dir: "asc" }
		}),
		segmentItemDS       : new kendo.data.DataSource({
			data: banhji.source.segmentItemList,
			sort: [
				{ field: "segment_id", dir: "asc" },
				{ field: "code", dir: "asc" }
			]
		}),
		categoryDS          : new kendo.data.DataSource({
			data: banhji.source.categoryList,
			filter: [
				{ field:"item_type_id", value: 1 },
				{ field:"id", operator:"neq", value: 5 },
				{ field:"id", operator:"neq", value: 6 }
			]
		}),
		itemGroupDS         : banhji.source.itemGroupDS,
		statusObj           : banhji.source.statusObj,
		amtDueColor         : banhji.source.amtDueColor,
		confirmMessage      : banhji.source.confirmMessage,
		dateUnitList       : banhji.source.dateUnitList,
		monthOptionList     : banhji.source.monthOptionList,
		monthList           : banhji.source.monthList,
		weekDayList         : banhji.source.weekDayList,
		dayList             : banhji.source.dayList,
		showMonthOption     : false,
		showMonth           : false,
		showWeek            : false,
		showDay             : false,
		obj                 : null,
		isEdit              : false,
		saveDraft           : false,
		saveClose           : false,
		savePrint           : false,
		saveRecurring       : false,
		showConfirm         : false,
		notDuplicateNumber  : true,
		recurring           : "",
		recurring_validate  : false,
		balance             : 0,
		total               : 0,
		barcode             : "",
		barcodeVisible      : false,
		category_id         : 0,
		item_group_id       : 0,
		user_id             : banhji.source.user_id,
		pageLoad            : function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Barcode
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				category_id = this.get("category_id"),
				item_group_id = this.get("item_group_id");

			if(item_group_id>0){
				para.push({ field:"number", value:item_group_id });
			}else{
				if(category_id>0){
					para.push({ field:"category_id", value:category_id });
				}
			}

			this.itemDS.query({
				filter: para,
				page:1,
				pageSize: 10
			});

			this.set("category_id", 0);
			this.set("item_group_id", 0);
		},
		searchByBarcode     : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				barcode = this.get("barcode");

			if(barcode!==""){
				this.itemDS.query({
					filter: { field: "barcode", value: barcode },
					page:1,
					pageSize: 1
				}).then(function(){
					var view = self.itemDS.view();

					if(view.length>0){
						self.insertItem(view[0]);
					}
				});

				this.set("barcode", "");
			}
		},
		addSearchItem       : function(e){
			var data = e.data;

			this.insertItem(data);
		},
		openBarcodeWindow   : function(){
			this.set("barcodeVisible", true);
		},
		closeBarcodeWindow  : function(){
			this.set("barcodeVisible", false);
		},
		insertItem      : function(data){
			var obj = this.get("obj"),
				rate = obj.rate / banhji.source.getRate(data.locale, new Date(obj.issued_date));

			var item_price = {
				measurement_id  : data.measurement_id,
				conversion_ratio: 1,
				measurement     : data.measurement.name
			};

			this.lineDS.insert(0, {
				transaction_id      : obj.id,
				tax_item_id         : 0,
				item_id             : data.id,
				assembly_id         : 0,
				measurement_id      : data.measurement_id,
				description         : data.sale_description,
				quantity            : 1,
				conversion_ratio    : 1,
				cost                : 0,
				price               : 0,
				amount              : 0,
				discount            : 0,
				discount_percentage : 0,
				tax                 : 0,
				rate                : rate,
				locale              : data.locale,
				movement            : 0,
				reference_no        : "",

				item                : data,
				item_price          : item_price,
				tax_item            : { id:"", name:"" },
				wht_account         : { id:"", name:"" }
			});
		},
		//Upload
		onSelect            : function(e){
			// Array with information about the uploaded files
			var self = this,
			files = e.files,
			obj = this.get("obj");
			// Check the extension of each file and abort the upload if it is not .jpg
			$.each(files, function(index, value){
				if (value.extension.toLowerCase() === ".jpg"
					|| value.extension.toLowerCase() === ".jpeg"
					|| value.extension.toLowerCase() === ".tiff"
					|| value.extension.toLowerCase() === ".png"
					|| value.extension.toLowerCase() === ".gif"
					|| value.extension.toLowerCase() === ".pdf"){

					var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

					self.attachmentDS.add({
						user_id         : self.get("user_id"),
						transaction_id  : obj.id,
						type            : "Transaction",
						name            : value.name,
						description     : "",
						key             : key,
						url             : banhji.s3 + key,
						size            : value.size,
						created_at      : new Date(),

						file            : value.rawFile
					});
				}else{
					alert("This type of file is not allowed to attach.");
				}
			});
		},
		removeFile          : function(e){
			var data = e.data;

			if (confirm(banhji.source.confirmMessage)) {
				this.attachmentDS.remove(data);
			}
		},
		uploadFile          : function(){
			$.each(this.attachmentDS.data(), function(index, value){
				if(!value.id){
					var params = {
						Body: value.file,
						Key: value.key
					};
					bucket.upload(params, function (err, data) {
						// console.log(err, data);
						// var url = data.Location;
					});
				}
			});

			this.attachmentDS.sync();
			var saved = false;
			this.attachmentDS.bind("requestEnd", function(e){
				//Delete File
				if(e.type=="destroy"){
					if(saved==false && e.response){
						saved = true;

						var response = e.response.results;
						$.each(response, function(index, value){
							var params = {
								//Bucket: 'STRING_VALUE', /* required */
								Delete: { /* required */
									Objects: [ /* required */
										{
											Key: value.data.key /* required */
										}
									  /* more items */
									]
								}
							};
							bucket.deleteObjects(params, function(err, data) {
								//console.log(err, data);
							});
						});
					}
				}
			});
		},
		//Contact
		setContact          : function(contact){
			var obj = this.get("obj");

			obj.set("contact", contact);
			this.contactChanges();
		},
		contactChanges      : function(){
			var self = this, obj = this.get("obj");

			if(obj.contact){
				var contact = obj.contact;

				obj.set("contact_id", contact.id);
				obj.set("locale", contact.locale);
				obj.set("bill_to", contact.bill_to);
				obj.set("ship_to", contact.ship_to);

				this.setRate();
				this.loadBalance();
			}

			this.changes();
		},
		loadBalance         : function(){
			var self = this, obj = this.get("obj");

			this.balanceDS.query({
				filter:[
					{ field:"contact_id", value:obj.contact_id },
					{ field:"type", operator:"where_in", value:["Cash_Purchase", "Credit_Purchase"] }
				]
			}).then(function(){
				var view = self.balanceDS.view(),
					contact = obj.contact,
					balance = view[0].amount,
					creditAllowed = 0;

				if(contact.credit_limit > balance){
					creditAllowed = contact.credit_limit - balance;
				}

				self.set("balance", kendo.toString(balance, "c", obj.locale));
				obj.set("credit_allowed", creditAllowed);
			});
		},
		//Currency Rate
		setRate             : function(){
			var obj = this.get("obj"),
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});
		},
		//Item
		addItem             : function(uid){
			var row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);
			row.set("description", item.purchase_description);
			row.set("rate", rate);
			row.set("locale", item.locale);

			//Item base price
			var item_price = {
				measurement_id  : item.measurement_id,
				conversion_ratio: 1,
				measurement     : item.measurement.name
			};
			row.set("item_price", item_price);
		},
		addItemCatalog      : function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

			$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id      : obj.id,
						tax_item_id         : 0,
						item_id             : catalogItem.id,
						measurement_id      : 0,
						description         : catalogItem.sale_description,
						quantity            : 1,
						conversion_ratio    : 1,
						cost                : 0,
						price               : 0,
						amount              : 0,
						discount            : 0,
						rate                : rate,
						locale              : catalogItem.locale,
						movement            : 0,

						discount_percentage : 0,
						item                : catalogItem,
						measurement         : { measurement_id:"", measurement:"" },
						tax_item            : { id:"", name:"" }
					});
				}
			});
		},
		changes             : function(){
			var self = this, obj = this.get("obj"),
				total = 0, subTotal = 0, discount =0, tax = 0, remaining = 0, amount_due = 0, itemIds = [];

			$.each(this.lineDS.data(), function(index, value) {
				var amt = value.quantity * value.cost;
				subTotal += amt;

				//Discount by line
				if(value.discount>0){
					amt -= value.discount;
					discount += value.discount;
				}

				//Tax by line
				if(value.tax_item_id>0){
					var taxAmount = amt * value.tax_item.rate;

					if(banhji.source.checkWHT(value.tax_item.tax_type_id) && value.wht_account_id==0){
						tax -= taxAmount;
					}else{
						tax += taxAmount;
					}

					value.set("tax", taxAmount);
				}else{
					value.set("tax", 0);
				}

				value.set("amount", amt);

				if(value.item_id>0){
					itemIds.push(value.item_id);
				}
			});

			//Total
			total = (subTotal + tax) - discount;

			//Warning over credit allowed
			if(obj.credit_allowed>0 && total>obj.credit_allowed){
				this.set("amtDueColor", "Gold");
			}else{
				this.set("amtDueColor", banhji.source.amtDueColor);
			}

			obj.set("sub_total", subTotal);
			obj.set("discount", discount);
			obj.set("tax", tax);
			obj.set("amount", total);

			this.set("total", kendo.toString(total, "c", obj.locale));
		},
		lineDSChanges       : function(arg){
			var self = banhji.purchaseOrder;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity" || arg.field=="cost" || arg.field=="discount"){
					self.changes();
				}else if(arg.field=="item_price"){
					var dataRow = arg.items[0];

					dataRow.set("measurement_id", dataRow.item_price.measurement_id);
					dataRow.set("conversion_ratio", dataRow.item_price.conversion_ratio);
				}else if(arg.field=="discount_percentage"){
					var dataRow = arg.items[0],
						percentageAmount = dataRow.quantity * dataRow.cost * dataRow.discount_percentage;

					dataRow.set("discount", percentageAmount);
				}else if(arg.field=="tax_item"){
					var dataRow = arg.items[0];

					dataRow.set("tax_item_id", dataRow.tax_item.id);
					dataRow.set("tax", 0);

					self.changes();
				}
			}
		},
		//Segment
		segmentChanges      : function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);

			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		//Number
		checkExistingNumber     : function(){
			var self = this, para = [],
			obj = this.get("obj");

			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}

				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();

					if(view.length>0){
						self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber      : function(){
			var self = this, obj = this.get("obj"),
				issueDate = new Date(obj.issued_date),
				startDate = new Date(obj.issued_date),
				endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.numberDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				]
			}).then(function(){
				var view = self.numberDS.view(),
				number = 0, str = "";

				if(view.length>0){
					number = view[0].number.match(/\d+/g).map(Number);
				}

				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

				obj.set("number", str);
			});
		},
		setStatus           : function(){
			var self = this,
				obj = this.get("obj"),
				statusObj = this.get("statusObj");

			statusObj.set("text", "");
			statusObj.set("date", "");
			statusObj.set("number", "");
			statusObj.set("url", "");

			switch(obj.status) {
				case 0:
					statusObj.set("text", "open");
					break;
				case 1:
					statusObj.set("text", "used");

					this.txnDS.query({
						filter:{ field:"reference_id", value: obj.id },
						sort: { field:"issued_date", dir:"desc" },
						page:1,
						pageSize:1
					}).then(function(){
						var view = self.txnDS.view();

						if(view.length>0){
							statusObj.set("date", kendo.toString(new Date(view[0].issued_date), "dd-MM-yyyy h:mm:ss tt"));
							statusObj.set("number", view[0].number);

							var url = "#/" + view[0].type.toLowerCase() + "/" + view[0].id;
							statusObj.set("url", url);
						}
					});
					break;
				case 2:
					statusObj.set("text", "partialy used");
					break;
				case 4:
					statusObj.set("text", "draft");
					break;
				default:
					//Default here
			}
		},
		//Obj
		loadObj             : function(id){
			var self = this, para = [], referenceIds = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.dataSource.view();

					self.set("obj", view[0]);
					self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
					self.setStatus();

					self.lineDS.query({
						filter: [
							{ field: "transaction_id", value: id },
							{ field: "assembly_id", value: 0 }
						]
					});

					self.attachmentDS.filter({ field: "transaction_id", value: id });
				});
			}
		},
		addEmpty            : function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);
			this.set("amtDueColor", banhji.source.amtDueColor);

			//Set Date
			var duedate = new Date();
			duedate.setDate(duedate.getDate() + 30);

			this.dataSource.insert(0, {
				contact_id          : "",
				transaction_template_id : 11,
				reference_id        : "",
				recurring_id        : "",
				job_id              : 0,
				user_id             : this.get("user_id"),
				employee_id         : "",
				type                : "Purchase_Order",//Required
				number              : "",
				sub_total           : 0,
				amount              : 0,
				credit_allowed      : 0,
				discount            : 0,
				tax                 : 0,
				rate                : 1,
				locale              : banhji.locale,
				issued_date         : new Date(),
				due_date            : duedate,
				bill_to             : "",
				ship_to             : "",
				memo                : "",
				memo2               : "",
				reuse               : 0,
				status              : 0,
				segments            : [],
				//Recurring
				recurring_name      : "",
				start_date          : new Date(),
				frequency           : "Daily",
				month_option        : "Day",
				interval            : 1,
				day                 : 1,
				week                : 0,
				month               : 0,
				is_recurring        : 0,

				contact             : { id:0, name:"" }
			});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.generateNumber();

			//Default rows
			for (var i = 0; i < banhji.source.defaultLines; i++) {
				this.addRow();
			}
		},
		addRow              : function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id      : obj.id,
				tax_item_id         : "",
				item_id             : "",
				assembly_id         : 0,
				measurement_id      : 0,
				description         : "",
				quantity            : 1,
				conversion_ratio    : 0,
				cost                : 0,
				price               : 0,
				amount              : 0,
				discount            : 0,
				rate                : obj.rate,
				locale              : obj.locale,
				movement            : 0,
				required_date       : "",
				reference_no        : "",

				discount_percentage : 0,
				item                : { id:"", name:"" },
				item_price          : { measurement_id:"", measurement:"" },
				tax_item            : { id:"", name:"" },
				wht_account         : { id:"", name:"" }
			});
		},
		addExtraRow         : function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeEmptyRow      : function(){
			var raw = this.lineDS.data();
			var item, i;
			for(i=raw.length-1; i>=0; i--){
				item = raw[i];

				if (item.item_id==0) {
					this.lineDS.remove(item);
				}
			}
		},
		removeRow           : function(e){
			var data = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(data);
				this.changes();
			}
		},
		objSync             : function(){
			var dfd = $.Deferred();

			this.dataSource.sync();
			this.dataSource.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		},
		save                : function(){
			var self = this, obj = this.get("obj");

			obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
			obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));

			//Warning over credit allowed
			if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
				alert("Over credit allowed!");
			}

			this.removeEmptyRow();

			//Save Draft
			if(this.get("saveDraft")){
				obj.set("status", 4); //In progress
				obj.set("progress", "Draft");
				obj.set("is_journal", 0);//No Journal
			}

			//Recurring
			if(this.get("saveRecurring")){
				this.set("saveRecurring", false);

				obj.set("number", "");
				obj.set("is_recurring", 1);
			}

			//Edit Mode
			if(obj.isNew()==false){
				//Use draft
				if(obj.status==4){
					obj.set("status", 0);//Open
					obj.set("progress", "");
					obj.set("is_journal", 1);//Add Journal
				}
			}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});
				}

				self.lineDS.sync();
				self.uploadFile();

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.clear();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		clear               : function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.attachmentDS.cancelChanges();

			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("purchase_order");
		},
		cancel              : function(){
			this.clear();
			window.history.back();
		},
		delete              : function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);

			this.txnDS.query({
				filter:[
					{ field:"reference_id", value:obj.id },
				],
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view();

				if(view.length>0){
					alert("Sorry, you can not delete it.");
				}else{
					obj.set("deleted", 1);
					self.dataSource.sync();
					self.dataSource.bind("requestEnd", function(e){
						if(e.type==="update"){
							window.history.back();
						}
					});
				}
			});
		},
		openConfirm         : function(){
			this.set("showConfirm", true);
		},
		closeConfirm        : function(){
			this.set("showConfirm", false);
		},
		validating          : function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.item_id>0){
					nonItem = false;
				}
			});

			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one item!");

				result = false;
			}

			return result;
		},
		//Recurring
		loadRecurring       : function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");

				obj.set("contact", view[0].contact);
				obj.set("contact_id", view[0].contact.id);
				obj.set("recurring_id", id);
				obj.set("employee_id", view[0].employee_id);//Sale Rep
				obj.set("job_id", view[0].job_id);
				obj.set("segments", view[0].segments);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);

				// self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter:[
					{ field: "transaction_id", value: id },
					{ field: "assembly_id", value: 0 }
				]
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id      : 0,
						tax_item_id         : value.tax_item_id,
						item_id             : value.item_id,
						measurement_id      : value.measurement_id,
						description         : value.description,
						quantity            : value.quantity,
						cost                : value.cost,
						price               : value.price,
						amount              : value.amount,
						discount            : value.discount,
						rate                : value.rate,
						locale              : value.locale,
						movement            : 0,
						required_date       : value.required_date,

						item                : value.item,
						item_price          : value.item_price,
						tax_item            : value.tax_item,
						wht_account         : value.wht_account
					});
				});

				self.changes();
			});
		},
		frequencyChanges    : function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
				case "Daily":
					this.set("showMonthOption", false);
					this.set("showMonth", false);
					this.set("showWeek", false);
					this.set("showDay", false);

					break;
				case "Weekly":
					this.set("showMonthOption", false);
					this.set("showMonth", false);
					this.set("showWeek", true);
					this.set("showDay", false);

					break;
				case "Monthly":
					this.set("showMonthOption", true);
					this.set("showMonth", false);
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				case "Annually":
					this.set("showMonthOption", false);
					this.set("showMonth", true);
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				default:
					//Default here..
			}
		},
		monthOptionChanges  : function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
				case "Day":
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				default:
					this.set("showWeek", true);
					this.set("showDay", false);
			}
		},
		recurringSync       : function(){
			var dfd = $.Deferred();

			this.recurringDS.sync();
			this.recurringDS.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.recurringDS.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		}
	});
	banhji.grn =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "transactions"),
		lineDS              : dataStore(apiUrl + "item_lines"),
		txnDS               : dataStore(apiUrl + "transactions"),
		numberDS            : dataStore(apiUrl + "transactions/number"),
		recurringDS         : dataStore(apiUrl + "transactions"),
		recurringLineDS     : dataStore(apiUrl + "item_lines"),
		referenceDS         : dataStore(apiUrl + "transactions"),
		referenceLineDS     : dataStore(apiUrl + "item_lines"),
		itemDS              : dataStore(apiUrl + "items"),
		itemPriceDS         : dataStore(apiUrl + "item_prices"),
		attachmentDS        : dataStore(apiUrl + "attachments"),
		categoryDS          : new kendo.data.DataSource({
			data: banhji.source.categoryList,
			filter: [
				{ field:"item_type_id", value: 1 },
				{ field:"id", operator:"neq", value: 5 },
				{ field:"id", operator:"neq", value: 6 }
			]
		}),
		itemGroupDS         : banhji.source.itemGroupDS,
		txnTemplateDS       : new kendo.data.DataSource({
			data: banhji.source.txnTemplateList,
			filter:{ field: "type", value: "GRN" }
		}),
		contactDS           : banhji.source.supplierDS,
		employeeDS          : banhji.source.employeeDS,
		statusObj           : banhji.source.statusObj,
		amtDueColor         : banhji.source.amtDueColor,
		confirmMessage      : banhji.source.confirmMessage,
		dateUnitList       : banhji.source.dateUnitList,
		monthOptionList     : banhji.source.monthOptionList,
		monthList           : banhji.source.monthList,
		weekDayList         : banhji.source.weekDayList,
		dayList             : banhji.source.dayList,
		showMonthOption     : false,
		showMonth           : false,
		showWeek            : false,
		showDay             : false,
		obj                 : null,
		isEdit              : false,
		saveDraft           : false,
		saveClose           : false,
		savePrint           : false,
		saveRecurring       : false,
		showConfirm         : false,
		notDuplicateNumber  : true,
		recurring           : "",
		recurring_validate  : false,
		enableRef           : false,
		total               : 0,
		barcode             : "",
		barcodeVisible      : false,
		category_id         : 0,
		item_group_id       : 0,
		user_id             : banhji.source.user_id,
		pageLoad            : function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Barcode
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				category_id = this.get("category_id"),
				item_group_id = this.get("item_group_id");

			if(item_group_id>0){
				para.push({ field:"number", value:item_group_id });
			}else{
				if(category_id>0){
					para.push({ field:"category_id", value:category_id });
				}
			}

			this.itemDS.query({
				filter: para,
				page:1,
				pageSize: 10
			});

			this.set("category_id", 0);
			this.set("item_group_id", 0);
		},
		searchByBarcode     : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				barcode = this.get("barcode");

			if(barcode!==""){
				this.itemDS.query({
					filter: { field: "barcode", value: barcode },
					page:1,
					pageSize: 1
				}).then(function(){
					var view = self.itemDS.view();

					if(view.length>0){
						self.insertItem(view[0]);
					}
				});

				this.set("barcode", "");
			}
		},
		addSearchItem       : function(e){
			var data = e.data;

			this.insertItem(data);
		},
		openBarcodeWindow   : function(){
			this.set("barcodeVisible", true);
		},
		closeBarcodeWindow  : function(){
			this.set("barcodeVisible", false);
		},
		insertItem      : function(data){
			var obj = this.get("obj"),
				rate = obj.rate / banhji.source.getRate(data.locale, new Date(obj.issued_date));

			var item_price = {
				measurement_id  : data.measurement_id,
				price           : kendo.parseFloat(data.price),
				conversion_ratio: 1,
				measurement     : data.measurement.name
			};

			this.lineDS.insert(0, {
				transaction_id      : obj.id,
				tax_item_id         : "",
				item_id             : data.id,
				assembly_id         : 0,
				measurement_id      : data.measurement_id,
				description         : data.sale_description,
				quantity            : 0,
				conversion_ratio    : 1,
				price               : data.price,
				amount              : 0,
				rate                : rate,
				locale              : data.locale,
				movement            : 0,

				item                : data,
				item_price          : data.measurement,
				bin_locations       : { id:0, number:"" },
				new_bin_locations   : { id:0, number:"" }
			});
		},
		//Upload
		onSelect            : function(e){
			// Array with information about the uploaded files
			var self = this,
			files = e.files,
			obj = this.get("obj");

			// Check the extension of each file and abort the upload if it is not .jpg
			$.each(files, function(index, value){
				if (value.extension.toLowerCase() === ".jpg"
					|| value.extension.toLowerCase() === ".jpeg"
					|| value.extension.toLowerCase() === ".tiff"
					|| value.extension.toLowerCase() === ".png"
					|| value.extension.toLowerCase() === ".gif"
					|| value.extension.toLowerCase() === ".pdf"){

					var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

					self.attachmentDS.add({
						user_id         : self.get("user_id"),
						transaction_id  : obj.id,
						type            : "Transaction",
						name            : value.name,
						description     : "",
						key             : key,
						url             : banhji.s3 + key,
						size            : value.size,
						created_at      : new Date(),

						file            : value.rawFile
					});
				}else{
					alert("This type of file is not allowed to attach.");
				}
			});
		},
		removeFile          : function(e){
			var data = e.data;

			if (confirm(banhji.source.confirmMessage)) {
				this.attachmentDS.remove(data);
			}
		},
		uploadFile          : function(){
			$.each(this.attachmentDS.data(), function(index, value){
				if(!value.id){
					var params = {
						Body: value.file,
						Key: value.key
					};
					bucket.upload(params, function (err, data) {
						// console.log(err, data);
						// var url = data.Location;
					});
				}
			});

			this.attachmentDS.sync();
			var saved = false;
			this.attachmentDS.bind("requestEnd", function(e){
				//Delete File
				if(e.type=="destroy"){
					if(saved==false && e.response){
						saved = true;

						var response = e.response.results;
						$.each(response, function(index, value){
							var params = {
								//Bucket: 'STRING_VALUE', /* required */
								Delete: { /* required */
									Objects: [ /* required */
										{
											Key: value.data.key /* required */
										}
									  /* more items */
									]
								}
							};
							bucket.deleteObjects(params, function(err, data) {
								//console.log(err, data);
							});
						});
					}
				}
			});
		},
		//Contact
		setContact          : function(contact){
			var obj = this.get("obj");

			obj.set("contact", contact);
			this.contactChanges();
		},
		contactChanges      : function(){
			var self = this, obj = this.get("obj");

			if(obj.contact){
				var contact = obj.contact;

				obj.set("contact_id", contact.id);
				obj.set("locale", contact.locale);
				obj.set("bill_to", contact.bill_to);
				obj.set("ship_to", contact.ship_to);

				this.setRate();
				this.loadReference();
			}

			this.changes();
		},
		//Currency Rate
		setRate             : function(){
			var obj = this.get("obj"),
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});
		},
		//Item
		addItem             : function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);
			row.set("description", item.sale_description);
			row.set("rate", rate);
			row.set("locale", item.locale);

			//Item base price
			var item_price = {
				measurement_id  : item.measurement_id,
				price           : kendo.parseFloat(item.price),
				conversion_ratio: 1,
				measurement     : item.measurement.name
			};
			row.set("item_price", item_price);
		},
		addItemCatalog      : function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

			$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id      : obj.id,
						tax_item_id         : 0,
						item_id             : catalogItem.id,
						measurement_id      : 0,
						description         : catalogItem.sale_description,
						quantity            : 1,
						conversion_ratio    : 1,
						cost                : 0,
						price               : 0,
						amount              : 0,
						discount            : 0,
						rate                : rate,
						locale              : catalogItem.locale,
						movement            : 0,

						item                : catalogItem,
						measurement         : { measurement_id:"", measurement:"" }
					});
				}
			});
		},
		changes             : function(){
			var self = this,
				obj = this.get("obj"),
				total = 0;

			$.each(this.lineDS.data(), function(index, value) {
				total += value.quantity;
			});

			obj.set("amount", total);

			this.set("total", kendo.toString(total, "n0"));
		},
		lineDSChanges       : function(arg){
			var self = banhji.grn;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity"){
					self.changes();
				}else if(arg.field=="item_price"){
					var dataRow = arg.items[0];

					dataRow.set("measurement_id", dataRow.item_price.measurement_id);
					dataRow.set("conversion_ratio", dataRow.item_price.conversion_ratio);
				}
			}
		},
		//Number
		checkExistingNumber     : function(){
			var self = this, para = [],
			obj = this.get("obj");

			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}

				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();

					if(view.length>0){
						self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber      : function(){
			var self = this, obj = this.get("obj"),
				issueDate = new Date(obj.issued_date),
				startDate = new Date(obj.issued_date),
				endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.numberDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				]
			}).then(function(){
				var view = self.numberDS.view(),
				number = 0, str = "";

				if(view.length>0){
					number = view[0].number.match(/\d+/g).map(Number);
				}

				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

				obj.set("number", str);
			});
		},
		setStatus           : function(){
			var self = this,
				obj = this.get("obj"),
				statusObj = this.get("statusObj");

			statusObj.set("text", "");
			statusObj.set("date", "");
			statusObj.set("number", "");
			statusObj.set("url", "");

			switch(obj.status) {
				case 0:
					statusObj.set("text", "open");
					break;
				case 1:
					statusObj.set("text", "Received");

					this.txnDS.query({
						filter:{ field:"reference_id", value: obj.id },
						sort: { field:"issued_date", dir:"desc" },
						page:1,
						pageSize:1
					}).then(function(){
						var view = self.txnDS.view();

						if(view.length>0){
							statusObj.set("date", kendo.toString(new Date(view[0].issued_date), "dd-MM-yyyy h:mm:ss tt"));
							statusObj.set("number", view[0].number);

							var url = "#/" + view[0].type.toLowerCase() + "/" + view[0].id;
							statusObj.set("url", url);
						}
					});
					break;
				case 4:
					statusObj.set("text", "draft");
					break;
				default:
					//Default here
			}
		},
		//Obj
		loadObj             : function(id){
			var self = this, para = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.dataSource.view();

					self.set("obj", view[0]);
					self.set("total", kendo.toString(view[0].amount, "n0"));
					self.setStatus();

					self.lineDS.query({
						filter: [
							{ field: "transaction_id", value: id },
							{ field: "assembly_id", value: 0 }
						]
					});
					self.attachmentDS.filter({ field: "transaction_id", value: id });
					self.loadReference();
				});
			}
		},
		addEmpty            : function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);

			this.dataSource.insert(0, {
				transaction_template_id : 5,
				contact_id          : "",
				reference_id        : "",
				recurring_id        : "",
				user_id             : this.get("user_id"),
				type                : "GRN",//Required
				number              : "",
				sub_total           : 0,
				amount              : 0,
				discount            : 0,
				tax                 : 0,
				rate                : 1,
				locale              : banhji.locale,
				issued_date         : new Date(),
				due_date            : new Date(),
				bill_to             : "",
				ship_to             : "",
				memo                : "",
				memo2               : "",
				status              : 0,
				segments            : [],
				//Concrete
				driver_id           : 0,
				driver_name         : "",
				truck_number        : "",
				time_batched        : "",
				time_of_discharge   : "",
				time_of_completion  : "",
				cubic_meter         : "",
				total_batch         : "",
				//Recurring
				recurring_name      : "",
				start_date          : new Date(),
				frequency           : "Daily",
				month_option        : "Day",
				interval            : 1,
				day                 : 1,
				week                : 0,
				month               : 0,
				is_recurring        : 0,

				contact             : { id:0, name:"" },
				driver              : { id:0, name:"" },
				references          : []
			});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.generateNumber();

			//Default rows
			for (var i = 0; i < banhji.source.defaultLines; i++) {
				this.addRow();
			}
		},
		addRow              : function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id      : obj.id,
				tax_item_id         : "",
				item_id             : "",
				measurement_id      : 0,
				description         : "",
				quantity            : 0,
				conversion_ratio    : 1,
				cost                : 0,
				amount              : 0,
				rate                : obj.rate,
				locale              : obj.locale,
				movement            : 0,

				item                : { id:"", name:"" },
				item_price          : { measurement_id:"", measurement:"" },
				bin_locations       : { id:0, number:"" },
				new_bin_locations   : { id:0, number:"" }
			});
		},
		removeRow           : function(e){
			var d = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(d);
				this.changes();
			}
		},
		addExtraRow         : function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeEmptyRow      : function(){
			var raw = this.lineDS.data();
			var item, i;
			for(i=raw.length-1; i>=0; i--){
				item = raw[i];

				if (item.item_id==0) {
					this.lineDS.remove(item);
				}
			}
		},
		objSync             : function(){
			var dfd = $.Deferred();

			this.dataSource.sync();
			this.dataSource.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		},
		save                : function(){
			var self = this, obj = this.get("obj");

			obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
			obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));
			obj.set("time_batched", kendo.toString(new Date(obj.time_batched), "HH:mm:ss"));
			obj.set("time_of_discharge", kendo.toString(new Date(obj.time_of_discharge), "HH:mm:ss"));
			obj.set("time_of_completion", kendo.toString(new Date(obj.time_of_completion), "HH:mm:ss"));

			this.removeEmptyRow();

			//Save Draft
			if(this.get("saveDraft")){
				obj.set("status", 4); //In progress
				obj.set("progress", "Draft");
				obj.set("is_journal", 0);//No Journal
			}

			//Recurring
			if(this.get("saveRecurring")){
				this.set("saveRecurring", false);

				obj.set("number", "");
				obj.set("is_recurring", 1);
			}

			//Edit Mode
			if(obj.isNew()==false){
				//Use draft
				if(obj.status==4){
					obj.set("status", 0);//Open
					obj.set("progress", "");
					obj.set("is_journal", 1);//Add Journal
				}
			}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});
				}

				self.lineDS.sync();
				self.uploadFile();

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.clear();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		clear               : function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.attachmentDS.cancelChanges();

			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("grn");
		},
		cancel              : function(){
			this.clear();
			window.history.back();
		},
		delete              : function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);

			this.txnDS.query({
				filter:[
					{ field:"reference_id", value:obj.id },
				],
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view();

				if(view.length>0){
					alert("Sorry, you can not delete it.");
				}else{
					obj.set("deleted", 1);
					self.dataSource.sync();
					self.dataSource.bind("requestEnd", function(e){
						if(e.type==="update"){
							window.history.back();
						}
					});
				}
			});
		},
		openConfirm         : function(){
			this.set("showConfirm", true);
		},
		closeConfirm        : function(){
			this.set("showConfirm", false);
		},
		validating          : function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.item_id>0){
					nonItem = false;
				}
			});

			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one item!");

				result = false;
			}

			return result;
		},
		//Reference
		loadReference       : function(){
			var obj = this.get("obj");

			if(obj.contact_id>0){
				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "type", operator:"where_in", value: ["Purchase_Order", "Cash_Purchase", "Credit_Purchase"] },
					{ field: "status", value:0 },
					{ field: "reuse", operator:"or_where", value:1 },
					{ field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
				]);
			}
		},
		referenceChanges    : function(e){
			var self = this,
				isExisting = false,
				obj = this.get("obj"),
				reference_id = this.get("reference_id");

			$.each(obj.references, function(index, value){
				if(value.id==reference_id){
					isExisting = true;

					return false;
				}
			});

			if(reference_id>0 && isExisting==false){
				var reference = this.referenceDS.get(reference_id);

				obj.references.push(reference);

				this.referenceLineDS.query({
					filter:[
						{ field:"transaction_id", value: reference_id },
						{ field: "assembly_id", value: 0 }
					]
				}).then(function(){
					var view = self.referenceLineDS.view();

					$.each(view, function(index, value){
						self.lineDS.insert(0, {
							transaction_id      : 0,
							reference_id        : reference.id,
							item_id             : value.item_id,
							tax_item_id         : value.tax_item_id,
							measurement_id      : value.measurement_id,
							description         : value.description,
							quantity            : value.quantity,
							conversion_ratio    : value.conversion_ratio,
							cost                : value.cost,
							amount              : value.amount,
							discount            : value.discount,
							rate                : value.rate,
							locale              : value.locale,
							movement            : 0,
							reference_no        : reference.number,

							item                : value.item,
							item_price          : value.item_price,
							bin_locations       : { id:0, number:"" },
							new_bin_locations   : { id:0, number:"" }
						});
					});

					self.changes();
				});
			}

			this.set("reference_id", 0);
		},
		referenceRemoveRow  : function(e){
			var data = e.data,
				obj = this.get("obj"),
				index = obj.references.indexOf(data);

			obj.references.splice(index, 1);
		},
		//Recurring
		loadRecurring       : function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");

				obj.set("contact", view[0].contact);
				obj.set("contact_id", view[0].contact.id);
				obj.set("recurring_id", id);
				obj.set("job_id", view[0].job_id);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);

				// self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter:[
					{ field: "transaction_id", value: id },
					{ field: "assembly_id", value: 0 }
				]
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id      : 0,
						tax_item_id         : value.tax_item_id,
						item_id             : value.item_id,
						measurement_id      : value.measurement_id,
						description         : value.description,
						quantity            : value.quantity,
						cost                : value.cost,
						amount              : value.amount,
						rate                : value.rate,
						locale              : value.locale,
						movement            : 0,

						item                : value.item,
						item_price          : value.item_price,
						bin_locations       : { id:0, number:"" },
						new_bin_locations   : { id:0, number:"" }
					});
				});

				self.changes();
			});
		},
		frequencyChanges    : function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
				case "Daily":
					this.set("showMonthOption", false);
					this.set("showMonth", false);
					this.set("showWeek", false);
					this.set("showDay", false);

					break;
				case "Weekly":
					this.set("showMonthOption", false);
					this.set("showMonth", false);
					this.set("showWeek", true);
					this.set("showDay", false);

					break;
				case "Monthly":
					this.set("showMonthOption", true);
					this.set("showMonth", false);
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				case "Annually":
					this.set("showMonthOption", false);
					this.set("showMonth", true);
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				default:
					//Default here..
			}
		},
		monthOptionChanges  : function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
				case "Day":
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				default:
					this.set("showWeek", true);
					this.set("showDay", false);
			}
		},
		recurringSync       : function(){
			var dfd = $.Deferred();

			this.recurringDS.sync();
			this.recurringDS.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.recurringDS.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		}
	});
	banhji.vendorDeposit =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "transactions"),
		lineDS              : dataStore(apiUrl + "account_lines"),
		txnDS               : dataStore(apiUrl + "transactions"),
		numberDS            : dataStore(apiUrl + "transactions/number"),
		referenceLineDS     : dataStore(apiUrl + "account_lines"),
		referenceDS         : dataStore(apiUrl + "transactions"),
		journalLineDS       : dataStore(apiUrl + "journal_lines"),
		recurringDS         : dataStore(apiUrl + "transactions"),
		recurringLineDS     : dataStore(apiUrl + "account_lines"),
		paymentMethodDS     : dataStore(apiUrl + "payment_methods"),
		attachmentDS        : dataStore(apiUrl + "attachments"),
		segmentItemDS       : new kendo.data.DataSource({
			data: banhji.source.segmentItemList,
			sort: [
				{ field: "segment_id", dir: "asc" },
				{ field: "code", dir: "asc" }
			]
		}),
		txnTemplateDS       : new kendo.data.DataSource({
			data: banhji.source.txnTemplateList,
			filter:{ field: "type", value: "Deposit" }
		}),
		accountDS           : new kendo.data.DataSource({
			data: banhji.source.accountList,
			filter:{
				logic: "or",
				filters: [
					{ field: "account_type_id", value: 10 },//Cash
					{ field: "account_type_id", value: 34 },//Retained Earning
					{ field: "account_type_id", value: 36 },//Expense
					{ field: "account_type_id", value: 37 },
					{ field: "account_type_id", value: 38 },
					{ field: "account_type_id", value: 40 },
					{ field: "account_type_id", value: 41 },
					{ field: "account_type_id", value: 42 },
					{ field: "account_type_id", value: 43 }
				]
			},
			sort: { field:"number", dir:"asc" }
		}),
		depositAccountDS    : new kendo.data.DataSource({
			data: banhji.source.accountList,
			filter: {
				logic: "or",
				filters: [
					{ field: "account_type_id", value: 14 },
					{ field: "account_type_id", value: 21 }
				]
			},
			sort: { field:"number", dir:"asc" }
		}),
		contactDS           : banhji.source.supplierDS,
		amtDueColor         : banhji.source.amtDueColor,
		confirmMessage      : banhji.source.confirmMessage,
		dateUnitList       : banhji.source.dateUnitList,
		monthList           : banhji.source.monthList,
		monthOptionList     : banhji.source.monthOptionList,
		weekDayList         : banhji.source.weekDayList,
		dayList             : banhji.source.dayList,
		showMonthOption     : false,
		showMonth           : false,
		showWeek            : false,
		showDay             : false,
		obj                 : null,
		isEdit              : false,
		saveClose           : false,
		savePrint           : false,
		saveRecurring       : false,
		showConfirm         : false,
		notDuplicateNumber  : true,
		statusSrc           : "",
		recurring           : "",
		recurring_validate  : false,
		enableRef           : false,
		total               : 0,
		user_id             : banhji.source.user_id,
		pageLoad            : function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Upload
		onSelect            : function(e){
			// Array with information about the uploaded files
			var self = this,
			files = e.files,
			obj = this.get("obj");

			// Check the extension of each file and abort the upload if it is not .jpg
			$.each(files, function(index, value){
				if (value.extension.toLowerCase() === ".jpg"
					|| value.extension.toLowerCase() === ".jpeg"
					|| value.extension.toLowerCase() === ".tiff"
					|| value.extension.toLowerCase() === ".png"
					|| value.extension.toLowerCase() === ".gif"
					|| value.extension.toLowerCase() === ".pdf"){

					var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

					self.attachmentDS.add({
						user_id         : self.get("user_id"),
						transaction_id  : obj.id,
						type            : "Transaction",
						name            : value.name,
						description     : "",
						key             : key,
						url             : banhji.s3 + key,
						size            : value.size,
						created_at      : new Date(),

						file            : value.rawFile
					});
				}else{
					alert("This type of file is not allowed to attach.");
				}
			});
		},
		removeFile          : function(e){
			var data = e.data;

			if (confirm(banhji.source.confirmMessage)) {
				this.attachmentDS.remove(data);
			}
		},
		uploadFile          : function(){
			$.each(this.attachmentDS.data(), function(index, value){
				if(!value.id){
					var params = {
						Body: value.file,
						Key: value.key
					};
					bucket.upload(params, function (err, data) {
						// console.log(err, data);
						// var url = data.Location;
					});
				}
			});

			this.attachmentDS.sync();
			var saved = false;
			this.attachmentDS.bind("requestEnd", function(e){
				//Delete File
				if(e.type=="destroy"){
					if(saved==false && e.response){
						saved = true;

						var response = e.response.results;
						$.each(response, function(index, value){
							var params = {
								//Bucket: 'STRING_VALUE', /* required */
								Delete: { /* required */
									Objects: [ /* required */
										{
											Key: value.data.key /* required */
										}
									  /* more items */
									]
								}
							};
							bucket.deleteObjects(params, function(err, data) {
								//console.log(err, data);
							});
						});
					}
				}
			});
		},
		//Contact
		setContact          : function(contact){
			var obj = this.get("obj");

			obj.set("contact", contact);
			this.contactChanges();
		},
		contactChanges      : function(){
			var self = this, obj = this.get("obj");

			if(obj.contact){
				var contact = obj.contact;

				obj.set("contact_id", contact.id);
				obj.set("locale", contact.locale);
				obj.set("account_id", contact.deposit_account_id);

				this.setRate();
				this.loadReference();
			}

			this.changes();
		},
		//Currency Rate
		setRate             : function(){
			var obj = this.get("obj"),
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

			obj.set("rate", rate);

			$.each(this.lineDS.data(), function(index, value){
				value.set("rate", rate);
				value.set("locale", obj.locale);
			});
		},
		//Segment
		segmentChanges      : function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);

			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		//Number
		checkExistingNumber     : function(){
			var self = this, para = [],
			obj = this.get("obj");

			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}

				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();

					if(view.length>0){
						self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber      : function(){
			var self = this, obj = this.get("obj"),
				issueDate = new Date(obj.issued_date),
				startDate = new Date(obj.issued_date),
				endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.numberDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				]
			}).then(function(){
				var view = self.numberDS.view(),
				number = 0, str = "";

				if(view.length>0){
					number = view[0].number.match(/\d+/g).map(Number);
				}

				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

				obj.set("number", str);
			});
		},
		//Obj
		addEmpty            : function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);
			this.journalLineDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);

			this.dataSource.insert(0, {
				transaction_template_id : 7,
				recurring_id        : "",
				contact_id          : "",
				account_id          : "",
				user_id             : this.get("user_id"),
				reference_id        : "",
				type                : "Vendor_Deposit", //required
				number              : "",
				amount              : 0,
				rate                : 1,
				locale              : banhji.locale,
				issued_date         : new Date(),
				memo                : "",
				memo2               : "",
				segments            : [],
				is_journal          : 1,
				//Recurring
				recurring_name      : "",
				start_date          : new Date(),
				frequency           : "Daily",
				month_option        : "Day",
				interval            : 1,
				day                 : 1,
				week                : 0,
				month               : 0,
				is_recurring        : 0,

				contact             : { id:0, name:"" }
			});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);

			this.setRate();
			this.addRow();
			this.generateNumber();
		},
		addRow              : function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id      : obj.id,
				payment_method_id   : 0,
				account_id          : "",
				contact_id          : "",
				description         : "",
				reference_no        : "",
				segments            : [],
				amount              : 0,
				rate                : obj.rate,
				locale              : obj.locale
			});
		},
		remove              : function(e){
			var d = e.data;
			this.lineDS.remove(d);
			this.changes();
		},
		changes             : function(){
			var obj = this.get("obj");

			if(this.lineDS.total()>0){
				var sum = 0;

				$.each(this.lineDS.data(), function(index, value) {
					sum += value.amount;
				});

				this.set("total", kendo.toString(sum, "c", obj.locale));
				obj.set("amount", sum);
			}else{
				this.set("total", 0);
				obj.set("amount", 0);
			}
		},
		loadObj             : function(id){
			var self = this, para = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.dataSource.view();

					if(view.length>0){
						self.set("obj", view[0]);
					}

					self.lineDS.query({
						filter:{ field: "transaction_id", value: id }
					});

					self.journalLineDS.query({
						filter:{ field: "transaction_id", value: id }
					});

					self.referenceDS.filter({ field: "id", value: view[0].reference_id });
				});
			}
		},
		objSync             : function(){
			var dfd = $.Deferred();

			this.dataSource.sync();
			this.dataSource.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		},
		save                : function(){
			var self = this, obj = this.get("obj");
			obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

			//Recurring
			if(this.get("saveRecurring")){
				this.set("saveRecurring", false);

				obj.set("number", "");
				obj.set("is_recurring", 1);
			}

			//Mode
			if(obj.isNew()==false){
				//Line has changed
				if(this.lineDS.hasChanges() && obj.is_recurring==0){
					$.each(this.journalLineDS.data(), function(index, value){
						value.set("deleted", 1);
					});

					this.addJournal(obj.id);
				}
			}

			//Reference
			if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				ref.set("deposit", obj.amount);
				this.referenceDS.sync();
			}else{
				obj.set("reference_id", 0);
			}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});
				}

				//Journal
				if(data[0].is_recurring==0 && data[0].is_journal==1){
					self.addJournal(data[0].id);
				}

				self.lineDS.sync();
				self.uploadFile();

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveClose")){
					//Save Close
					self.set("saveClose", false);
					self.cancel();
					window.history.back();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.cancel();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		cancel              : function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.attachmentDS.cancelChanges();

			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("vendor_deposit");
		},
		delete              : function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);

			this.txnDS.query({
				filter:[
					{ field:"reference_id", value:obj.id }
				],
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view();

				if(view.length>0){
					alert("Sorry, you can not delete it.");
				}else{
					obj.set("deleted", 1);
					self.dataSource.sync();
					self.dataSource.bind("requestEnd", function(e){
						if(e.type==="update"){
							window.history.back();
						}
					});
				}
			});
		},
		openConfirm         : function(){
			this.set("showConfirm", true);
		},
		closeConfirm        : function(){
			this.set("showConfirm", false);
		},
		validating          : function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.account_id>0){
					nonItem = false;
				}
			});

			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one account!");

				result = false;
			}

			return result;
		},
		//Journal
		addJournal          : function(transaction_id){
			var self = this,
			sum =0,
			obj = this.get("obj");

			//Edit Mode
			if(obj.isNew()==false){
				//Delete previous journal
				$.each(this.journalLineDS.data(), function(index, value){
					value.set("deleted", 1);
				});
			}

			//Cash account on CR
			$.each(this.lineDS.data(), function(index, value){
				sum += value.amount;
				self.journalLineDS.add({
					transaction_id      : transaction_id,
					account_id          : value.account_id,
					contact_id          : value.contact_id,
					description         : "",
					reference_no        : value.reference_no,
					segments            : obj.segments,
					dr                  : 0,
					cr                  : value.amount,
					rate                : value.rate,
					locale              : value.locale
				});
			});

			//Deposit on DR
			this.journalLineDS.add({
				transaction_id      : transaction_id,
				account_id          : obj.account_id,
				contact_id          : obj.contact_id,
				description         : "",
				reference_no        : "",
				segments            : obj.segments,
				dr                  : sum,
				cr                  : 0,
				rate                : obj.rate,
				locale              : obj.locale
			});

			this.journalLineDS.sync();
		},
		//Reference
		loadReference       : function(){
			var obj = this.get("obj");

			if(obj.contact_id>0){
				this.set("enableRef", true);

				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "deposit", value: 0 },
					{ field: "type", value: "Purchase_Order" },
					{ field: "status", value:0 },
					{ field: "reuse", operator:"or_where", value:1 },
					{ field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
				]);
			}else{
				this.set("enableRef", false);
				obj.set("reference_id", "");
			}
		},
		referenceChanges    : function(){
			var obj = this.get("obj");

			if(obj.reference_id>0){
				var reference = this.referenceDS.get(obj.reference_id);

				obj.set("reference_no", reference.number);
				obj.set("segments", reference.segments);
				obj.set("amount", reference.amount);

				this.lineDS.data([]);
				this.lineDS.add({
					transaction_id      : obj.id,
					reference_id        : reference.id,
					account_id          : "",
					description         : "",
					reference_no        : reference.number,
					amount              : reference.amount,
					rate                : reference.rate,
					locale              : reference.locale
				});
				this.set("total", kendo.toString(reference.amount, "c", reference.locale));
			}
		},
		//Recurring
		loadRecurring       : function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");

				obj.set("recurring_id", id);
				obj.set("contact", view[0].contact);
				obj.set("contact_id", view[0].contact.id);
				obj.set("account_id", view[0].account_id);
				obj.set("segments", view[0].segments);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("contact", view[0].contact);

				// self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter: { field:"transaction_id", value:id },
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id      : 0,
						payment_method_id   : value.payment_method_id,
						account_id          : value.account_id,
						contact_id          : value.contact_id,
						description         : value.description,
						reference_no        : value.reference_no,
						segments            : value.segments,
						amount              : value.amount,
						rate                : value.rate,
						locale              : value.locale
					});
				});

				self.changes();
			});
		},
		frequencyChanges    : function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
				case "Daily":
					this.set("showMonthOption", false);
					this.set("showMonth", false);
					this.set("showWeek", false);
					this.set("showDay", false);

					break;
				case "Weekly":
					this.set("showMonthOption", false);
					this.set("showMonth", false);
					this.set("showWeek", true);
					this.set("showDay", false);

					break;
				case "Monthly":
					this.set("showMonthOption", true);
					this.set("showMonth", false);
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				case "Annually":
					this.set("showMonthOption", false);
					this.set("showMonth", true);
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				default:
					//Default here..
			}
		},
		monthOptionChanges  : function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
				case "Day":
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				default:
					this.set("showWeek", true);
					this.set("showDay", false);
			}
		},
		recurringSync       : function(){
			var dfd = $.Deferred();

			this.recurringDS.sync();
			this.recurringDS.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.recurringDS.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		}
	});
	banhji.purchase =  kendo.observable({
		lang                        : langVM,
		dataSource                  : dataStore(apiUrl + "transactions"),
		lineDS                      : dataStore(apiUrl + "item_lines"),
		txnDS                       : dataStore(apiUrl + "transactions"),
		numberDS                    : dataStore(apiUrl + "transactions/number"),
		accountLineDS               : dataStore(apiUrl + "account_lines"),
		journalLineDS               : dataStore(apiUrl + "journal_lines"),
		additionalCostDS            : dataStore(apiUrl + "transactions"),
		recurringDS                 : dataStore(apiUrl + "transactions"),
		recurringLineDS             : dataStore(apiUrl + "item_lines"),
		recurringAccountLineDS      : dataStore(apiUrl + "account_lines"),
		recurringAdditionalCostDS   : dataStore(apiUrl + "transactions"),
		referenceDS                 : dataStore(apiUrl + "transactions"),
		referenceLineDS             : dataStore(apiUrl + "item_lines"),
		attachmentDS                : dataStore(apiUrl + "attachments"),
		depositDS                   : dataStore(apiUrl + "transactions"),
		balanceDS                   : dataStore(apiUrl + "transactions/balance"),
		itemDS                      : dataStore(apiUrl + "items"),
		itemPriceDS                 : dataStore(apiUrl + "item_prices"),
		assemblyDS                  : dataStore(apiUrl + "item_assemblies"),
		segmentDS                   : dataStore(apiUrl + "segments"),
		segItemDS                   : dataStore(apiUrl + "segments/item"),
		segmentItemDS               : dataStore(apiUrl + "segments/item"),
		jobDS                       : new kendo.data.DataSource({
			data: banhji.source.jobList,
			sort: { field: "name", dir: "asc" }
		}),
		accountDS                   : new kendo.data.DataSource({
			data: banhji.source.accountList
		}),
		whtAccountDS                : new kendo.data.DataSource({
			data: banhji.source.accountList,
			filter: {
				logic: "or",
				filters: [
					{ field: "account_type_id", value: 13 },//Inventory
					{ field: "account_type_id", value: 16 },//Fixed Asset
					{ field: "account_type_id", value: 17 },//Intangible Assets
					{ field: "account_type_id", value: 36 },//Expense
					{ field: "account_type_id", value: 37 },
					{ field: "account_type_id", value: 38 },
					{ field: "account_type_id", value: 40 },
					{ field: "account_type_id", value: 41 },
					{ field: "account_type_id", value: 42 },
					{ field: "account_type_id", value: 43 }
				]
			},
			sort: { field:"number", dir:"asc" }
		}),
		additionalCostAccountDS     : new kendo.data.DataSource({
			data: banhji.source.accountList
		}),
		txnTemplateDS               : new kendo.data.DataSource({
			data: banhji.source.txnTemplateList,
			filter:{
				filters: [
					{ field: "type", value: "Purchase" }
				]
			}
		}),
		taxItemDS                   : new kendo.data.DataSource({
			data: banhji.source.taxList,
			filter:{
				logic: "or",
				filters: [
					{ field: "tax_type_id", value: 1 },//Supplier Tax
					{ field: "tax_type_id", value: 2 },
					{ field: "tax_type_id", value: 3 },
					{ field: "tax_type_id", value: 9 }
				]
			},
			sort: [
				{ field: "tax_type_id", dir: "asc" },
				{ field: "name", dir: "asc" }
			]
		}),
		categoryDS                  : new kendo.data.DataSource({
			data: banhji.source.categoryList,
			filter: [
				{ field:"item_type_id", value: 1 },
				{ field:"id", operator:"neq", value: 5 },
				{ field:"id", operator:"neq", value: 6 }
			]
		}),
		itemGroupDS                 : banhji.source.itemGroupDS,
		paymentTermDS               : banhji.source.paymentTermDS,
		paymentMethodDS             : banhji.source.paymentMethodDS,
		contactDS                   : banhji.source.supplierDS,
		additionalContactDS         : banhji.source.supplierDS,
		statusObj                   : banhji.source.statusObj,
		amtDueColor                 : banhji.source.amtDueColor,
		confirmMessage              : banhji.source.confirmMessage,
		dateUnitList               : banhji.source.dateUnitList,
		monthOptionList             : banhji.source.monthOptionList,
		monthList                   : banhji.source.monthList,
		weekDayList                 : banhji.source.weekDayList,
		dayList                     : banhji.source.dayList,
		showMonthOption             : false,
		showMonth                   : false,
		showWeek                    : false,
		showDay                     : false,
		obj                         : null,
		additCostObj                : null,
		isEdit                      : false,
		saveDraft                   : false,
		saveClose                   : false,
		savePrint                   : false,
		saveRecurring               : false,
		showConfirm                 : false,
		notDuplicateNumber          : true,
		recurring                   : "",
		recurring_validate          : false,
		isCash                      : true,
		isAdditCostCash             : true,
		windowVisible               : false,
		balance                     : 0,
		total                       : 0,
		amount_due                  : 0,
		total_deposit               : 0,
		reference_id                : 0,
		additCostCurrency           : "",
		barcode                     : "",
		barcodeVisible              : false,
		category_id                 : 0,
		item_group_id               : 0,
		user_id                     : banhji.source.user_id,
		pageLoad            : function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Barcode
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				category_id = this.get("category_id"),
				item_group_id = this.get("item_group_id");

			if(item_group_id>0){
				para.push({ field:"number", value:item_group_id });
			}else{
				if(category_id>0){
					para.push({ field:"category_id", value:category_id });
				}
			}

			this.itemDS.query({
				filter: para,
				page:1,
				pageSize: 10
			});

			this.set("category_id", 0);
			this.set("item_group_id", 0);
		},
		searchByBarcode     : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				barcode = this.get("barcode");

			if(barcode!==""){
				this.itemDS.query({
					filter: { field: "barcode", value: barcode },
					page:1,
					pageSize: 1
				}).then(function(){
					var view = self.itemDS.view();

					if(view.length>0){
						self.insertItem(view[0]);
					}
				});

				this.set("barcode", "");
			}
		},
		addSearchItem       : function(e){
			var data = e.data;

			this.insertItem(data);
		},
		openBarcodeWindow   : function(){
			this.set("barcodeVisible", true);
		},
		closeBarcodeWindow  : function(){
			this.set("barcodeVisible", false);
		},
		insertItem      : function(data){
			var obj = this.get("obj"),
				rate = obj.rate / banhji.source.getRate(data.locale, new Date(obj.issued_date));

			var item_price = {
				measurement_id  : data.measurement_id,
				conversion_ratio: 1,
				measurement     : data.measurement.name
			};

			this.lineDS.insert(0, {
				transaction_id      : obj.id,
				tax_item_id         : 0,
				item_id             : data.id,
				assembly_id         : 0,
				measurement_id      : data.measurement_id,
				description         : data.purchase_description,
				quantity            : 1,
				conversion_ratio    : 1,
				cost                : 0,
				price               : 0,
				amount              : 0,
				discount            : 0,
				discount_percentage : 0,
				tax                 : 0,
				rate                : rate,
				locale              : data.locale,
				movement            : 1,
				reference_no        : "",

				item                : data,
				item_price          : item_price,
				tax_item            : { id:"", name:"" },
				wht_account         : { id:"", name:"" }
			});
		},
		//Upload
		onSelect            : function(e){
			// Array with information about the uploaded files
			var self = this,
			files = e.files,
			obj = this.get("obj");

			// Check the extension of each file and abort the upload if it is not .jpg
			$.each(files, function(index, value){
				if (value.extension.toLowerCase() === ".jpg"
					|| value.extension.toLowerCase() === ".jpeg"
					|| value.extension.toLowerCase() === ".tiff"
					|| value.extension.toLowerCase() === ".png"
					|| value.extension.toLowerCase() === ".gif"
					|| value.extension.toLowerCase() === ".pdf"){

					var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

					self.attachmentDS.add({
						user_id         : self.get("user_id"),
						transaction_id  : obj.id,
						type            : "Transaction",
						name            : value.name,
						description     : "",
						key             : key,
						url             : banhji.s3 + key,
						size            : value.size,
						created_at      : new Date(),

						file            : value.rawFile
					});
				}else{
					alert("This type of file is not allowed to attach.");
				}
			});
		},
		removeFile          : function(e){
			var data = e.data;

			if (confirm(banhji.source.confirmMessage)) {
				this.attachmentDS.remove(data);
			}
		},
		uploadFile          : function(){
			$.each(this.attachmentDS.data(), function(index, value){
				if(!value.id){
					var params = {
						Body: value.file,
						Key: value.key
					};
					bucket.upload(params, function (err, data) {
						// console.log(err, data);
						// var url = data.Location;
					});
				}
			});

			this.attachmentDS.sync();
			var saved = false;
			this.attachmentDS.bind("requestEnd", function(e){
				//Delete File
				if(e.type=="destroy"){
					if(saved==false && e.response){
						saved = true;

						var response = e.response.results;
						$.each(response, function(index, value){
							var params = {
								//Bucket: 'STRING_VALUE', /* required */
								Delete: { /* required */
									Objects: [ /* required */
										{
											Key: value.data.key /* required */
										}
									  /* more items */
									]
								}
							};
							bucket.deleteObjects(params, function(err, data) {
								//console.log(err, data);
							});
						});
					}
				}
			});
		},
		//Deposit
		loadDeposit         : function(){
			var self = this, obj = this.get("obj");

			//Deposits on Edit Mode
			if(this.get("isEdit")){
				this.depositDS.filter([
					{ field:"type", value:"Vendor_Deposit" },
					{ field:"reference_id", value:obj.id }
				]);
			}

			if(obj.contact_id>0){
				this.txnDS.query({
					filter:[
						{ field:"amount", operator:"select_sum", value:"amount" },
						{ field:"contact_id", value: obj.contact_id },
						{ field:"type", value: "Vendor_Deposit" }
					]
				}).then(function(){
					var view = self.txnDS.view();

					self.set("total_deposit", view[0].amount + obj.deposit);
				});
			}
		},
		addDeposit          : function(id){
			var obj = this.get("obj");

			this.depositDS.data([]);

			if(obj.deposit>0){
				this.depositDS.add({
					contact_id          : obj.contact_id,
					reference_id        : id,
					user_id             : this.get("user_id"),
					type                : "Vendor_Deposit",
					amount              : obj.deposit*-1,
					rate                : obj.rate,
					locale              : obj.locale,
					issued_date         : obj.issued_date
				});
			}
		},
		saveDeposit         : function(id){
			var obj = this.get("obj");

			if(this.get("isEdit")){
				if(this.depositDS.total()>0){
					var deposit = this.depositDS.at(0);
					deposit.set("amount", obj.deposit*-1);
				}else{
					this.addDeposit(id);
				}
			}else{
				this.addDeposit(id);
			}

			this.depositDS.sync();
		},
		//Contact
		setContact          : function(contact){
			var obj = this.get("obj");

			obj.set("contact", contact);
			this.contactChanges();
		},
		contactChanges      : function(){
			var self = this, obj = this.get("obj");

			if(obj.contact){
				var contact = obj.contact;

				obj.set("contact_id", contact.id);
				obj.set("account_id", contact.account_id);
				obj.set("payment_term_id", contact.payment_term_id);
				obj.set("payment_method_id", contact.payment_method_id);
				obj.set("locale", contact.locale);
				obj.set("bill_to", contact.bill_to);
				obj.set("ship_to", contact.ship_to);

				this.setRate();
				this.loadDeposit();
				this.loadBalance();
				this.loadReference();
			}

			this.changes();
		},
		loadBalance         : function(){
			var self = this, obj = this.get("obj");

			this.balanceDS.query({
				filter:[
					{ field:"contact_id", value:obj.contact_id },
					{ field:"type", operator:"where_in", value:["Cash_Purchase", "Credit_Purchase"] }
				]
			}).then(function(){
				var view = self.balanceDS.view(),
					contact = obj.contact,
					balance = view[0].amount,
					creditAllowed = 0;

				if(contact.credit_limit > balance){
					creditAllowed = contact.credit_limit - balance;
				}

				self.set("balance", kendo.toString(balance, "c", obj.locale));
				obj.set("credit_allowed", creditAllowed);
			});
		},
		//Currency Rate
		setRate             : function(){
			var obj = this.get("obj"),
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Account Line
			$.each(this.accountLineDS.data(), function(index, value){
				value.set("rate", rate);
				value.set("locale", obj.locale);
			});
		},
		//Segments
		addSegmentItem      : function(){
			var obj = this.get("obj"),
				notExisting = true,
				segment_id = this.get("segment_id"),
				segmentitem_id = this.get("segmentitem_id");

			if(segment_id && segmentitem_id){
				$.each(this.segmentItemDS.data(), function(index, value){
					if(value.segment_id==segment_id){
						notExisting = false;

						return false;
					}
				});

				if(notExisting){
					var segments = this.segmentDS.get(segment_id),
						segmentitems = this.segItemDS.get(segmentitem_id);

					this.segmentItemDS.add({
						id : segmentitems.id,
						segment_id: segment_id,
						code: segmentitems.code,
						name: segmentitems.name,
						segment: { id : segment_id, name : segments.name}
					});
				}else{
					$("#ntf1").data("kendoNotification").warning("This segment is already selected!");
				}
			}

			this.set("segment_id", ""),
			this.set("segmentitem_id", "");
		},
		//Additional Cost
		additCostContactChanges: function(){
			var additCostObj = this.get("additCostObj");

			if(additCostObj.contact){
				var contact = additCostObj.contact,
					code = banhji.source.getCurrencyCode(contact.locale);

				additCostObj.set("contact_id", contact.id);
				additCostObj.set("locale", contact.locale);
				this.set("additCostCurrency", code);
				this.additCostSetRate();
			}
		},
		additCostTypeChanges: function(){
			var additCostObj = this.get("additCostObj");

			if(additCostObj.type=="Cash_Purchase"){
				this.set("isAdditCostCash", true);

				this.additionalCostAccountDS.filter({ field:"account_type_id", value: 10 });
			}else{
				this.set("isAdditCostCash", false);

				this.additionalCostAccountDS.filter({
					logic: "or",
					filters: [
					  { field: "account_type_id", value: 23 },
					  { field: "account_type_id", value: 24 }
					]
				});
			}

			additCostObj.set("account_id", 0);
		},
		additCostSetRate: function(){
			var additCostObj = this.get("additCostObj"),
				rate = banhji.source.getRate(additCostObj.locale, new Date(additCostObj.issued_date));

				additCostObj.set("rate", rate);
		},
		windowCreate        : function(){
			var self = this,
				obj = this.get("obj"),
				additCostObj = this.get("additCostObj");

			this.additionalCostAccountDS.filter({ field:"account_type_id", value:10 });

			this.additionalCostDS.insert(0, {
				contact_id          : "",
				account_id          : 1,
				payment_term_id     : 0,
				reference_id        : obj.id,
				recurring_id        : "",
				tax_item_id         : "",
				wht_account_id      : "",
				user_id             : this.get("user_id"),
				reference_no        : "",
				type                : "Cash_Purchase",//Required
				sub_total           : 0,
				amount              : 0,
				tax                 : 0,
				rate                : 1,
				locale              : obj.locale,
				issued_date         : new Date(),
				due_date            : new Date(),
				bill_to             : "",
				ship_to             : "",
				memo                : "",
				memo2               : "",
				status              : 0,
				segments            : [],
				//Recurring
				recurring_name      : "",
				start_date          : new Date(),
				frequency           : "Daily",
				month_option        : "Day",
				interval            : 1,
				day                 : 1,
				week                : 0,
				month               : 0,
				is_recurring        : 0,

				contact             : { id:0, name:"" }
			});

			var additCostObj = this.additionalCostDS.at(0);
			this.set("additCostObj", additCostObj);
			this.additCostSetRate();

			// Apply additional cost to item line
			$.each(this.lineDS.data(), function(index, value) {
				if(value.item_id>0){
					if(value.item.item_type_id==1){
						value.set("additional_applied", true);
					}
				}
			});

			this.set("windowVisible", true);
		},
		windowEdit          : function(e){
			var data = e.data;

			if(data.type=="Cash_Purchase"){
				this.set("isAdditCostCash", true);

				this.additionalCostAccountDS.filter({ field:"account_type_id", value: 10 });
			}else{
				this.set("isAdditCostCash", false);

				this.additionalCostAccountDS.filter({
					logic: "or",
					filters: [
					  { field: "account_type_id", value: 23 },
					  { field: "account_type_id", value: 24 }
					]
				});
			}

			this.set("additCostObj", data);
			this.set("windowVisible", true);
		},
		windowSave          : function(){
			this.set("windowVisible", false);
		},
		windowDiscard       : function(){
			var additCostObj = this.get("additCostObj"),
				index = this.additionalCostDS.indexOf(additCostObj),
				selected = this.additionalCostDS.at(index);

			this.additionalCostDS.remove(selected);
			this.changes();

			this.set("windowVisible", false);
		},
		windowClose         : function(){
			this.set("windowVisible", false);
		},
		//Item
		addItem             : function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);
			row.set("description", item.sale_description);
			row.set("rate", rate);
			row.set("locale", item.locale);

			//Item base price
			var item_price = {
				measurement_id  : item.measurement_id,
				conversion_ratio: 1,
				measurement     : item.measurement.name
			};
			row.set("item_price", item_price);
		},
		addItemCatalog      : function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

			var catalogList = [];
			$.each(item.catalogs, function(index, value){
				catalogList.push(value);
			});

			this.itemDS.query({
				filter: { field:"id", operator:"where_in", value: catalogList }
			}).then(function(){
				var view = self.itemDS.view();

				$.each(view, function(index, value){
					var rate = obj.rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id      : obj.id,
						tax_item_id         : 0,
						item_id             : value.id,
						measurement_id      : 0,
						description         : value.sale_description,
						quantity            : 1,
						conversion_ratio    : 1,
						cost                : 0,
						price               : 0,
						amount              : 0,
						discount            : 0,
						rate                : rate,
						locale              : value.locale,
						movement            : 1,

						discount_percentage : 0,
						item                : value,
						measurement         : { measurement_id:"", measurement:"" },
						tax_item            : { id:"", name:"" },
						wht_account         : { id:"", name:"" }
					});
				});

			});
		},
		addRow              : function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id      : obj.id,
				tax_item_id         : "",
				wht_account_id      : "",
				item_id             : "",
				measurement_id      : 0,
				description         : "",
				quantity            : 1,
				conversion_ratio    : 1,
				cost                : 0,
				amount              : 0,
				discount            : 0,
				rate                : obj.rate,
				locale              : obj.locale,
				additional_cost     : 0,
				additional_applied  : false,
				movement            : 1,
				reference_no        : "",

				discount_percentage : 0,
				item                : { id:"", name:"" },
				item_price          : { measurement_id:"", measurement:"" },
				tax_item            : { id:"", name:"" },
				wht_account         : { id:"", name:"" }
			});
		},
		addExtraRow         : function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeRow           : function(e){
			var d = e.data;

			this.lineDS.remove(d);
			this.changes();
		},
		removeEmptyRow      : function(){
			var row, i;

			//Item
			var item = this.lineDS.data();
			for(i=item.length-1; i>=0; i--){
				row = item[i];

				if (row.item_id==0) {
					this.lineDS.remove(row);
				}
			}

			//Account
			var account = this.accountLineDS.data();
			for(i=account.length-1; i>=0; i--){
				row = account[i];

				if (row.account_id==0) {
					this.accountLineDS.remove(row);
				}
			}
		},
		itemLineDSChanges       : function(arg){
			var self = banhji.purchase;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity" || arg.field=="cost" || arg.field=="discount" || arg.field=="additional_applied"){
					self.changes();
				}else if(arg.field=="item_price"){
					var dataRow = arg.items[0];

					dataRow.set("measurement_id", dataRow.item_price.measurement_id);
					dataRow.set("conversion_ratio", dataRow.item_price.conversion_ratio);
				}else if(arg.field=="discount_percentage"){
					var dataRow = arg.items[0],
						percentageAmount = dataRow.quantity * dataRow.cost * dataRow.discount_percentage;

					dataRow.set("discount", percentageAmount);
				}else if(arg.field=="tax_item"){
					var dataRow = arg.items[0];

					dataRow.set("tax_item_id", dataRow.tax_item.id);
					dataRow.set("tax", 0);

					self.changes();
				}else if(arg.field=="wht_account"){
					var dataRow = arg.items[0];

					dataRow.set("wht_account_id", dataRow.wht_account.id);

					self.changes();
				}
			}
		},
		//Account
		addRowAccount       : function(){
			var obj = this.get("obj");

			this.accountLineDS.add({
				transaction_id      : obj.id,
				tax_item_id         : "",
				wht_account_id      : "",
				account_id          : "",
				description         : "",
				reference_no        : "",
				segments            : [],
				amount              : 0,
				rate                : obj.rate,
				locale              : obj.locale,

				account             : { id:"", name:"" },
				tax_item            : { id:"", name:"" },
				wht_account         : { id:"", name:"" }
			});
		},
		addExtraRowAccount      : function(uid){
			var row = this.accountLineDS.getByUid(uid),
				index = this.accountLineDS.indexOf(row);

			if(index==this.accountLineDS.total()-1){
				this.addRowAccount();
			}
		},
		removeRowAccount    : function(e){
			var d = e.data;

			this.accountLineDS.remove(d);
			this.changes();
		},
		accountLineDSChanges        : function(arg){
			var self = banhji.purchase;

			if(arg.field){
				if(arg.field=="account"){
					var dataRow = arg.items[0],
						account = dataRow.account;

					dataRow.set("account_id", account.id);

					self.addExtraRowAccount(dataRow.uid);
				}else if(arg.field=="amount"){
					self.changes();
				}else if(arg.field=="tax_item"){
					var dataRow = arg.items[0];

					dataRow.set("tax_item_id", dataRow.tax_item.id);
					dataRow.set("tax", 0);

					self.changes();
				}else if(arg.field=="wht_account"){
					var dataRow = arg.items[0];

					dataRow.set("wht_account_id", dataRow.wht_account.id);

					self.changes();
				}
			}
		},
		//Number
		checkExistingNumber     : function(){
			var self = this, para = [],
			obj = this.get("obj");

			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}

				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();

					if(view.length>0){
						self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber      : function(){
			var self = this, obj = this.get("obj"),
				issueDate = new Date(obj.issued_date),
				startDate = new Date(obj.issued_date),
				endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.numberDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				]
			}).then(function(){
				var view = self.numberDS.view(),
				number = 0, str = "";

				if(view.length>0){
					number = view[0].number.match(/\d+/g).map(Number);
				}

				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

				obj.set("number", str);
			});
		},
		setStatus           : function(){
			var self = this,
				obj = this.get("obj"),
				statusObj = this.get("statusObj");

			statusObj.set("text", "");
			statusObj.set("date", "");
			statusObj.set("number", "");
			statusObj.set("url", "");

			switch(obj.status) {
				case 0:
					statusObj.set("text", "open");
					break;
				case 1:
					statusObj.set("text", "paid");

					this.txnDS.query({
						filter:{ field:"reference_id", value: obj.id },
						sort: { field:"issued_date", dir:"desc" },
						page:1,
						pageSize:1
					}).then(function(){
						var view = self.txnDS.view();

						if(view.length>0){
							statusObj.set("date", kendo.toString(new Date(view[0].issued_date), "dd-MM-yyyy h:mm:ss tt"));
							statusObj.set("number", view[0].number);

							var url = "#/" + view[0].type.toLowerCase() + "/" + view[0].id;
							statusObj.set("url", url);
						}
					});
					break;
				case 2:
					statusObj.set("text", "partialy paid");
					break;
				case 4:
					statusObj.set("text", "draft");
					break;
				default:
					//Default here
			}
		},
		//Obj
		loadObj             : function(id){
			var self = this, para = [], referenceIds = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.dataSource.view();

					if(view[0].type=="Cash_Purchase"){
						self.set("isCash", true);

						self.accountDS.filter({ field: "account_type_id", value: 10 });
					}else{
						self.set("isCash", false);

						self.accountDS.filter({ field: "account_type_id", value: 23 });
					}

					self.set("obj", view[0]);
					self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
					self.set("amount_due", kendo.toString(view[0].amount - view[0].deposit, "c", view[0].locale));
					self.set("additional_cost", kendo.toString(view[0].additional_cost, "c", view[0].locale));
					self.setStatus();

					self.lineDS.query({
						filter: { field: "transaction_id", value: id }
					});

					self.accountLineDS.query({
						filter: { field: "transaction_id", value: id }
					});

					self.journalLineDS.query({
						filter: { field: "transaction_id", value: id }
					});

					self.attachmentDS.filter({ field: "transaction_id", value: id });

					//Additional Cost
					var additionalCostPara = [];
					if(view[0].is_recurring=="1"){
						additionalCostPara.push({ field: "is_recurring", value: 1 });
					}
					additionalCostPara.push({ field: "reference_id", value: id });
					additionalCostPara.push({ field: "type", operator:"where_in", value: ["Cash_Purchase","Credit_Purchase"] });
					self.additionalCostDS.filter(additionalCostPara);

					//Segment
					var segments = [];
					$.each(view[0].segments, function(index, value){
						segments.push(value);
					});
					self.segmentItemDS.query({
						filter: { field: "id", operator:"where_in", value: segments }
					});

					self.loadDeposit();
					self.loadReference();
				});
			}
		},
		changes             : function(){
			var self = this, obj = this.get("obj"),
				total = 0, subTotal = 0, discount = 0, tax = 0,
				countAdditCheck = 0, amountAdditCheck = 0, additionalCost = 0,
				remaining = 0, amount_due = 0;

			//Item Line
			$.each(this.lineDS.data(), function(index, value) {
				var amt = value.quantity * value.cost;
				subTotal += amt;

				//Discount by line
				if(value.discount>0){
					amt -= value.discount;
					discount += value.discount;
				}

				//Tax by line
				if(value.tax_item_id>0){
					var taxAmount = amt * value.tax_item.rate;

					if(banhji.source.checkWHT(value.tax_item.tax_type_id) && value.wht_account_id==0){
						tax -= taxAmount;
					}else{
						tax += taxAmount;
					}

					value.set("tax", taxAmount);
				}else{
					value.set("tax", 0);
				}

				//Count additional cost and check
				if(value.additional_applied){
					amountAdditCheck += amt;
					countAdditCheck++;
				}

				value.set("amount", amt);
				value.set("additional_cost", 0);//Reset additional cost
			});

			//Account Line
			$.each(this.accountLineDS.data(), function(index, value) {
				subTotal += value.amount;

				//Tax by line
				if(value.tax_item_id>0){
					var taxAmount = value.amount * value.tax_item.rate;

					if(banhji.source.checkWHT(value.tax_item.tax_type_id) && value.wht_account_id==0){
						tax -= taxAmount;
					}else{
						tax += taxAmount;
					}

					value.set("tax", taxAmount);
				}else{
					value.set("tax", 0);
				}
			});

			//Additional Cost Line
			$.each(this.additionalCostDS.data(), function(index, value) {
				//Tax by line
				var additionalTax = 0, additionalRate = obj.rate / value.rate;
				if(value.tax_item_id>0){
					var taxItem = self.taxItemDS.get(value.tax_item_id),
						additionalTax = value.sub_total * taxItem.rate;

					if(banhji.source.checkWHT(taxItem.tax_type_id) && value.wht_account_id==0){
						tax -= additionalTax;
					}else{
						tax += additionalTax;
					}

					value.set("tax", additionalTax);
				}else{
					value.set("tax", 0);
				}

				additionalCost += value.sub_total * additionalRate;
				value.set("amount", value.sub_total + additionalTax);
			});

			//Apply additional cost
			if(additionalCost>0){
				// this.set("showAdditionalCost", true);

				if(countAdditCheck>0){
					$.each(this.lineDS.data(), function(index, value) {
						if(value.additional_applied){
							if(obj.additional_apply=="Equal"){
								//subTotal += singleAdditionalCost;
								var singleAdditionalCost = additionalCost / countAdditCheck;
								value.set("additional_cost", singleAdditionalCost);
							}else{
								var percentageAdditionalCheck = value.amount / amountAdditCheck;
								var weightedAdditionalCost = additionalCost * percentageAdditionalCheck;

								//subTotal += weightedAdditionalCost;
								value.set("additional_cost", weightedAdditionalCost);
							}
						}
					});
				}

				var grid = $("#grid").data("kendoGrid");
				grid.showColumn("additional_cost");
				grid.showColumn("additional_applied");
				grid.refresh();
			}else{
				// this.set("showAdditionalCost", false);

				$.each(this.lineDS.data(), function(index, value) {
					value.set("additional_cost", 0);
					// value.set("additional_applied", false);
				});
			}

			//Total
			total = (subTotal + tax) - discount;

			//Apply Deposit
			if(obj.deposit>0){
				if(obj.deposit <= this.get("total_deposit")){
					if(obj.deposit <= total){
						remaining = total - obj.deposit;
					}else{
						obj.set("deposit", total);
					}
				}else{
					alert("Over deposit to apply!");
					obj.set("deposit", 0);
				}

				//Status
				if(remaining==0){
					obj.set("status", 1);
				}else if(remaining==total){
					obj.set("status", 0);
				}else{
					obj.set("status", 2);
				}
			}

			//Warning over credit allowed
			if(obj.credit_allowed>0 && total>obj.credit_allowed){
				this.set("amtDueColor", "Gold");
			}else{
				this.set("amtDueColor", banhji.source.amtDueColor);
			}

			amount_due = total - obj.deposit;

			obj.set("sub_total", subTotal);
			obj.set("discount", discount);
			obj.set("tax", tax);
			obj.set("amount", total);
			obj.set("additional_cost", additionalCost);
			obj.set("remaining", remaining);

			this.set("total", kendo.toString(total, "c2", obj.locale));
			this.set("amount_due", kendo.toString(amount_due, "c2", obj.locale));
		},
		typeChanges         : function(){
			var obj = this.get("obj");

			if(obj.type=="Cash_Purchase"){
				this.set("isCash", true);

				this.accountDS.filter({ field:"account_type_id", value: 10 });
				obj.set("account_id", 0);

				var dropdownlist = $("#ddlAccount").data("kendoDropDownList");
				dropdownlist.select(7);
				dropdownlist.trigger("change");
			}else{
				this.set("isCash", false);

				this.accountDS.filter({ field: "account_type_id", value: 23 });
				obj.set("account_id", 0);
				obj.set("account_id", obj.contact.account_id);
			}

			this.generateNumber();
		},
		addEmpty            : function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.accountLineDS.data([]);
			this.journalLineDS.data([]);
			this.additionalCostDS.data([]);
			this.attachmentDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);
			this.set("amount_due", 0);
			this.set("amtDueColor", banhji.source.amtDueColor);

			//Set Date
			var duedate = new Date();
			duedate.setDate(duedate.getDate() + 30);

			this.dataSource.insert(0, {
				transaction_template_id : 0,
				account_id          : 7,
				contact_id          : "",
				payment_term_id     : 0,
				payment_method_id   : 0,
				reference_id        : "",
				recurring_id        : "",
				job_id              : 0,
				user_id             : this.get("user_id"),
				type                : "Cash_Purchase", //Required
				nature_type 		: "Purchase",
				number              : "",
				sub_total           : 0,
				discount            : 0,
				tax                 : 0,
				amount              : 0,
				deposit             : 0,
				remaining           : 0,
				credit_allowed      : 0,
				additional_cost     : 0,
				additional_apply    : "Equal",
				rate                : 1,
				movement 			: 1,
				locale              : banhji.locale,
				issued_date         : new Date(),
				bill_date           : new Date(),
				due_date            : duedate,
				bill_to             : "",
				ship_to             : "",
				memo                : "",
				memo2               : "",
				status              : 0,
				reference_no        : "",
				check_no            : "",
				segments            : [],
				is_journal          : 1,
				//Recurring
				recurring_name      : "",
				start_date          : new Date(),
				frequency           : "Daily",
				month_option        : "Day",
				interval            : 1,
				day                 : 1,
				week                : 0,
				month               : 0,
				is_recurring        : 0,

				contact             : { id:0, name:"" },
				references          : []
			});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.typeChanges();
			this.generateNumber();

			//Default rows
			for (var i = 0; i < banhji.source.defaultLines; i++) {
				this.addRow();
				this.addRowAccount();
			}
		},
		objSync             : function(){
			var dfd = $.Deferred();

			this.dataSource.sync();
			this.dataSource.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		},
		save                : function(){
			var self = this, obj = this.get("obj"), segments = [];

			obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
			obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));
			obj.set("bill_date", kendo.toString(new Date(obj.bill_date), "yyyy-MM-dd"));

			//Warning over credit allowed
			if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
				alert("Over credit allowed!");
			}

			this.removeEmptyRow();

			//Segment
			$.each(this.segmentItemDS.data(), function(index, value){
				segments.push(value.id);
			});
			obj.set("segments", segments);

			//Save Draft
			if(this.get("saveDraft")){
				obj.set("status", 4); //In progress
				obj.set("progress", "Draft");
				obj.set("is_journal", 0);//No Journal
			}

			//Recurring
			if(this.get("saveRecurring")){
				this.set("saveRecurring", false);

				obj.set("number", "");
				obj.set("is_recurring", 1);
			}

			//Edit Mode
			if(obj.isNew()==false){
				//Use draft
				if(obj.status==4){
					obj.set("status", 0);//Open
					obj.set("progress", "");
					obj.set("is_journal", 1);//Add Journal
				}
			}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Account line
					$.each(self.accountLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Additional Cost line
					$.each(self.additionalCostDS.data(), function(index, value){
						value.set("reference_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});
				}

				//Journal
				if(data[0].is_recurring==0 && data[0].is_journal==1){
					self.addJournal(data[0].id);
					self.saveDeposit(data[0].id);
				}

				self.lineDS.sync();
				self.accountLineDS.sync();
				self.additionalCostDS.sync();
				self.uploadFile();

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.clear();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		clear               : function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.accountLineDS.cancelChanges();
			this.additionalCostDS.cancelChanges();
			this.referenceDS.cancelChanges();
			this.attachmentDS.cancelChanges();
			this.segmentItemDS.cancelChanges();

			this.dataSource.data([]);
			this.lineDS.data([]);
			this.accountLineDS.data([]);
			this.additionalCostDS.data([]);
			this.referenceDS.data([]);
			this.attachmentDS.data([]);
			this.segmentItemDS.data([]);

			banhji.userManagement.removeMultiTask("purchase");
		},
		cancel              : function(){
			this.clear();
			window.history.back();
		},
		delete              : function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);

			this.txnDS.query({
				filter:[
					{ field:"reference_id", value:obj.id },
				],
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view();

				if(view.length>0){
					alert("Sorry, you can not delete it.");
				}else{
					obj.set("deleted", 1);
					self.dataSource.sync();
					self.dataSource.bind("requestEnd", function(e){
						if(e.type==="update"){
							window.history.back();
						}
					});
				}
			});
		},
		openConfirm         : function(){
			this.set("showConfirm", true);
		},
		closeConfirm        : function(){
			this.set("showConfirm", false);
		},
		validating          : function(){
			var result = true, obj = this.get("obj");

			if(obj.contact_id==0){
				$("#ntf1").data("kendoNotification").warning("Please select a supplier.");

				result = false;
			}

			if(this.lineDS.total()==0 && this.accountLineDS.total()==0){
				$("#ntf1").data("kendoNotification").warning("Please select an item or account.");

				result = false;
			}

			return result;
		},
		//Journal
		addJournal          : function(transaction_id){
			var self = this,
				obj = this.get("obj"),
				contact = obj.contact,
				raw = "", entries = {};

			//Edit Mode
			if(obj.isNew()==false){
				//Delete previous journal
				$.each(this.journalLineDS.data(), function(index, value){
					value.set("deleted", 1);
				});
			}

			//Item lines
			$.each(this.lineDS.data(), function(index, value){
				var item = value.item;

				//Service on Dr
				var serviceID = kendo.parseInt(item.expense_account_id);
				if(serviceID>0 && item.item_type_id==4){
					raw = "dr"+serviceID;

					var serviceAmount = (value.quantity*value.conversion_ratio*value.cost) + value.additional_cost;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : serviceID,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : serviceAmount,
							cr                  : 0,
							rate                : value.rate,
							locale              : item.locale
						};
					}else{
						entries[raw].dr += serviceAmount;
					}
				}

				//Inventory on Dr
				var inventoryID = kendo.parseInt(item.inventory_account_id);
				if(inventoryID>0){
					raw = "dr"+inventoryID;

					var inventoryAmount = (value.quantity*value.conversion_ratio*value.cost) + value.additional_cost;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : inventoryID,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : inventoryAmount,
							cr                  : 0,
							rate                : value.rate,
							locale              : item.locale
						};
					}else{
						entries[raw].dr += inventoryAmount;
					}
				}

				//Tax on Dr
				if(value.tax_item_id>0){
					var taxItem = value.tax_item,
						raw = "dr"+taxItem.account_id,
						taxAmt = value.amount * taxItem.rate;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : taxItem.account_id,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : taxAmt,
							cr                  : 0,
							rate                : obj.rate,
							locale              : obj.locale
						};
					}else{
						entries[raw].dr += taxAmt;
					}
				}
			});

			//Account line
			$.each(this.accountLineDS.data(), function(index, value){
				//Expense Account on Dr
				var accountID = kendo.parseInt(value.account_id);
				if(accountID>0){
					raw = "dr"+accountID;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : accountID,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : value.reference_no,
							segments            : value.segments,
							dr                  : value.amount,
							cr                  : 0,
							rate                : obj.rate,
							locale              : obj.locale
						};
					}else{
						entries[raw].dr += value.amount;
					}
				}

				//Tax on Dr
				if(value.tax_item_id>0){
					var taxItem = value.tax_item,
						raw = "dr"+taxItem.account_id,
						taxAmt = value.amount * taxItem.rate;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : taxItem.account_id,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : taxAmt,
							cr                  : 0,
							rate                : obj.rate,
							locale              : obj.locale
						};
					}else{
						entries[raw].dr += taxAmt;
					}
				}
			});

			//Additional cost line
			$.each(this.additionalCostDS.data(), function(index, value){
				var additionalRate = obj.rate / value.rate,
					additionalAccountID = value.account_id,
					additionalAmt = value.sub_total * additionalRate;

				//Cash or A/P on Cr
				if(additionalAccountID>0){
					raw = "cr"+additionalAccountID;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : additionalAccountID,
							contact_id          : value.contact_id,
							description         : value.memo,
							reference_no        : value.reference_no,
							segments            : value.segments,
							dr                  : 0,
							cr                  : additionalAmt,
							rate                : additionalRate,
							locale              : value.locale
						};
					}else{
						entries[raw].cr += additionalAmt;
					}
				}

				//Tax on Dr
				if(value.tax_item_id>0){
					var taxItem = self.taxItemDS.get(value.tax_item_id),
						raw = "dr"+taxItem.account_id,
						taxAmt = value.sub_total * additionalRate * taxItem.rate;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : taxItem.account_id,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : taxAmt,
							cr                  : 0,
							rate                : obj.rate,
							locale              : obj.locale
						};
					}else{
						entries[raw].dr += taxAmt;
					}
				}
			});

			//Obj Account on Cr
			var objAccountID = kendo.parseInt(obj.account_id);
			if(objAccountID>0){
				raw = "cr"+objAccountID;

				var objAmount = obj.amount - obj.deposit;
				if(entries[raw]===undefined){
					entries[raw] = {
						transaction_id      : transaction_id,
						account_id          : objAccountID,
						contact_id          : obj.contact_id,
						description         : obj.memo,
						reference_no        : obj.reference_no,
						segments            : obj.segments,
						dr                  : 0,
						cr                  : objAmount,
						rate                : obj.rate,
						locale              : obj.locale
					};
				}else{
					entries[raw].cr += objAmount;
				}
			}

			//Discount on Cr
			if(obj.discount > 0){
				var discountAccountId = kendo.parseInt(contact.trade_discount_id);
				if(discountAccountId>0){
					raw = "cr"+discountAccountId;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : discountAccountId,
							contact_id          : obj.contact_id,
							description         : obj.memo,
							reference_no        : obj.reference_no,
							segments            : obj.segments,
							dr                  : 0,
							cr                  : obj.discount,
							rate                : obj.rate,
							locale              : obj.locale
						};
					}else{
						entries[raw].cr += obj.discount;
					}
				}
			}

			//Deposit on Cr
			if(obj.deposit > 0){
				var depositAccountId = kendo.parseInt(contact.deposit_account_id);
				if(depositAccountId>0){
					raw = "cr"+depositAccountId;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : depositAccountId,
							contact_id          : obj.contact_id,
							description         : obj.memo,
							reference_no        : obj.reference_no,
							segments            : obj.segments,
							dr                  : 0,
							cr                  : obj.deposit,
							rate                : obj.rate,
							locale              : obj.locale
						};
					}else{
						entries[raw].cr += obj.deposit;
					}
				}
			}

			//Add to journal entry
			if(!jQuery.isEmptyObject(entries)){
				$.each(entries, function(index, value){
					self.journalLineDS.add(value);
				});
			}

			this.journalLineDS.sync();
		},
		//Reference
		loadReference       : function(){
			var obj = this.get("obj");

			if(obj.contact_id>0){
				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "status", value:0 },
					{ field: "reuse", operator:"or_where", value:1 },
					{ field: "type", operator:"where_in", value: ["Purchase_Order","GRN","Receipt_Note"] },
					{ field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
				]);
			}
		},
		referenceChanges    : function(e){
			var self = this,
				isExisting = false,
				obj = this.get("obj"),
				reference_id = this.get("reference_id");

			$.each(obj.references, function(index, value){
				if(value.id==reference_id){
					isExisting = true;

					return false;
				}
			});

			if(reference_id>0 && isExisting==false){
				var reference = this.referenceDS.get(reference_id),
					deposit = kendo.parseFloat(reference.deposit) + kendo.parseFloat(obj.deposit);

				obj.set("deposit", deposit);
				obj.references.push(reference);

				this.referenceLineDS.query({
					filter:[
						{ field:"transaction_id", value: reference_id },
						{ field: "assembly_id", value: 0 }
					]
				}).then(function(){
					var view = self.referenceLineDS.view();

					$.each(view, function(index, value){
						self.lineDS.insert(0, {
							transaction_id      : obj.id,
							reference_id        : reference.id,
							tax_item_id         : value.tax_item_id,
							item_id             : value.item_id,
							measurement_id      : value.measurement_id,
							description         : value.description,
							quantity            : value.quantity,
							conversion_ratio    : value.conversion_ratio,
							cost                : value.cost,
							amount              : value.amount,
							discount            : value.discount,
							rate                : value.rate,
							locale              : value.locale,
							movement            : 1,
							additional_cost     : value.additional_cost,
							additional_applied  : value.additional_applied,
							reference_no        : reference.number,

							item                : value.item,
							item_price          : value.item_price,
							tax_item            : value.tax_item,
							wht_account         : value.wht_account
						});
					});

					self.changes();
				});
			}

			this.set("reference_id", 0);
		},
		referenceRemoveRow  : function(e){
			var data = e.data,
				obj = this.get("obj"),
				index = obj.references.indexOf(data),
				deposit = kendo.parseFloat(obj.deposit) - kendo.parseFloat(data.deposit);

			obj.set("deposit", deposit);

			obj.references.splice(index, 1);
		},
		//Recurring
		loadRecurring       : function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");

				obj.set("recurring_id", id);
				obj.set("contact", view[0].contact);
				obj.set("contact_id", view[0].contact.id);
				obj.set("account_id", view[0].account_id);
				obj.set("payment_method_id", view[0].payment_method_id);
				obj.set("job_id", view[0].job_id);
				obj.set("type", view[0].type);
				obj.set("additional_cost", view[0].additional_cost);
				obj.set("additional_apply", view[0].additional_apply);
				obj.set("check_no", view[0].check_no);
				obj.set("segments", view[0].segments);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);
				obj.set("contact", view[0].contact);

				self.setContact(view[0].contact);
				self.typeChanges();
			});

			this.recurringLineDS.query({
				filter:{ field: "transaction_id", value: id }
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id      : 0,
						tax_item_id         : value.tax_item_id,
						item_id             : value.item_id,
						measurement_id      : value.measurement_id,
						description         : value.description,
						quantity            : value.quantity,
						cost                : value.cost,
						amount              : value.amount,
						discount            : value.discount,
						rate                : value.rate,
						locale              : value.locale,
						additional_cost     : value.additional_cost,
						additional_applied  : value.additional_applied,
						movement            : 1,

						item                : value.item,
						item_price          : value.item_price,
						tax_item            : value.tax_item,
						wht_account         : value.wht_account
					});
				});

				self.changes();
			});

			//Account Line
			this.recurringAccountLineDS.query({
				filter: { field:"transaction_id", value:id },
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringAccountLineDS.view();
				self.accountLineDS.data([]);

				$.each(view, function(index, value){
					self.accountLineDS.add({
						transaction_id      : 0,
						tax_item_id         : value.tax_item_id,
						account_id          : value.account_id,
						description         : value.description,
						reference_no        : value.reference_no,
						segments            : value.segments,
						amount              : value.amount,
						rate                : value.rate,
						locale              : value.locale,

						tax_item            : value.tax_item,
						wht_account         : value.wht_account
					});
				});

				self.changes();
			});

			//Additional Cost Line
			this.recurringAdditionalCostDS.query({
				filter: [
					{ field:"reference_id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringAdditionalCostDS.view();
				self.additionalCostDS.data([]);

				$.each(view, function(index, value){
					self.additionalCostDS.add({
						contact_id          : value.contact_id,
						payment_term_id     : value.payment_term_id,
						reference_id        : value.reference_id,
						recurring_id        : value.recurring_id,
						tax_item_id         : value.tax_item_id,
						user_id             : value.user_id,
						reference_no        : value.reference_no,
						type                : value.type,//Required
						sub_total           : value.sub_total,
						amount              : value.amount,
						tax                 : value.tax,
						rate                : value.rate,
						locale              : value.locale,
						issued_date         : new Date(),
						due_date            : new Date(),
						bill_to             : value.bill_to,
						ship_to             : value.ship_to,
						memo                : value.memo,
						memo2               : value.memo2,
						status              : value.status,
						segments            : value.segments
					});
				});

				self.changes();
			});
		},
		frequencyChanges    : function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
				case "Daily":
					this.set("showMonthOption", false);
					this.set("showMonth", false);
					this.set("showWeek", false);
					this.set("showDay", false);

					break;
				case "Weekly":
					this.set("showMonthOption", false);
					this.set("showMonth", false);
					this.set("showWeek", true);
					this.set("showDay", false);

					break;
				case "Monthly":
					this.set("showMonthOption", true);
					this.set("showMonth", false);
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				case "Annually":
					this.set("showMonthOption", false);
					this.set("showMonth", true);
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				default:
					//Default here..
			}
		},
		monthOptionChanges  : function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
				case "Day":
					this.set("showWeek", false);
					this.set("showDay", true);

					break;
				default:
					this.set("showWeek", true);
					this.set("showDay", false);
			}
		},
		recurringSync       : function(){
			var dfd = $.Deferred();

			this.recurringDS.sync();
			this.recurringDS.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.recurringDS.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		}
	});
	banhji.purchaseDashBoard =  kendo.observable({
		lang                        : langVM,
		dataSource                  : dataStore(apiUrl + "transactions"),
		lineDS                      : dataStore(apiUrl + "item_lines"),
		txnDS                       : dataStore(apiUrl + "transactions"),
		numberDS                    : dataStore(apiUrl + "transactions/number"),
		depositDS                   : dataStore(apiUrl + "transactions"),
		journalLineDS               : dataStore(apiUrl + "journal_lines"),
		// itemDS                      : dataStore(apiUrl + "items"),
		accountDS                   : new kendo.data.DataSource({
			data: banhji.source.accountList
		}),
		whtAccountDS                : new kendo.data.DataSource({
			data: banhji.source.accountList,
			filter: {
				logic: "or",
				filters: [
					{ field: "account_type_id", value: 13 },//Inventory
					{ field: "account_type_id", value: 16 },//Fixed Asset
					{ field: "account_type_id", value: 17 },//Intangible Assets
					{ field: "account_type_id", value: 36 },//Expense
					{ field: "account_type_id", value: 37 },
					{ field: "account_type_id", value: 38 },
					{ field: "account_type_id", value: 40 },
					{ field: "account_type_id", value: 41 },
					{ field: "account_type_id", value: 42 },
					{ field: "account_type_id", value: 43 }
				]
			},
			sort: { field:"number", dir:"asc" }
		}),
		txnTemplateDS               : new kendo.data.DataSource({
			data: banhji.source.txnTemplateList,
			filter:{
				logic: "or",
				filters: [
					{ field: "type", value: "Cash_Purchase" },
					{ field: "type", value: "Credit_Purchase" }
				]
			}
		}),
		taxItemDS                   : new kendo.data.DataSource({
			data: banhji.source.taxList,
			filter:{
				logic: "or",
				filters: [
					{ field: "tax_type_id", value: 1 },//Supplier Tax
					{ field: "tax_type_id", value: 2 },
					{ field: "tax_type_id", value: 3 },
					{ field: "tax_type_id", value: 9 }
				]
			},
			sort: [
				{ field: "tax_type_id", dir: "asc" },
				{ field: "name", dir: "asc" }
			]
		}),
		categoryDS                  : new kendo.data.DataSource({
			data: banhji.source.categoryList,
			filter: [
				{ field:"item_type_id", value: 1 },
				{ field:"id", operator:"neq", value: 5 },
				{ field:"id", operator:"neq", value: 6 }
			]
		}),
		itemGroupDS                 : banhji.source.itemGroupDS,
		paymentTermDS               : banhji.source.paymentTermDS,
		paymentMethodDS             : banhji.source.paymentMethodDS,
		contactDS                   : banhji.source.supplierDS,
		statusObj                   : banhji.source.statusObj,
		amtDueColor                 : banhji.source.amtDueColor,
		confirmMessage              : banhji.source.confirmMessage,
		obj                         : null,
		isEdit                      : false,
		saveDraft                   : false,
		saveClose                   : false,
		savePrint                   : false,
		showConfirm                 : false,
		notDuplicateNumber          : true,
		isCash                      : true,
		windowVisible               : false,
		balance                     : 0,
		total                       : 0,
		amount_due                  : 0,
		total_deposit               : 0,
		reference_id                : 0,
		additCostCurrency           : "",
		barcode                     : "",
		barcodeVisible              : false,
		category_id                 : 0,
		item_group_id               : 0,
		user_id                     : banhji.source.user_id,
		pageLoad            : function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Barcode
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				searchText = this.get("searchText"),
				category_id = this.get("category_id"),
				item_group_id = this.get("item_group_id");

			if(item_group_id>0){
				para.push({ field:"item_group_id", value:item_group_id });
			}else{
				if(category_id>0){
					para.push({ field:"category_id", value:category_id });
				}
			}

			if(searchText!==""){
				para.push({ field:"number", operator:"like", value:searchText });
				para.push({ field:"name", operator:"or_like", value:searchText });
			}

			para.push({ field:"item_type_id", operator:"where_in", value:[1,4] });

			this.itemDS.query({
				filter: para,
				page:1,
				pageSize: 10
			});

			this.set("searchText", "");
			this.set("category_id", 0);
			this.set("item_group_id", 0);
		},
		searchByBarcode     : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				barcode = this.get("barcode");

			if(barcode!==""){
				para.push({ field:"item_type_id", operator:"where_in", value:[1,4] });
				para.push({ field: "barcode", value: barcode });

				this.itemDS.query({
					filter: para,
					page:1,
					pageSize: 1
				}).then(function(){
					var view = self.itemDS.view();

					if(view.length>0){
						self.insertItem(view[0]);
					}
				});

				this.set("barcode", "");
			}
		},
		addSearchItem       : function(e){
			var data = e.data;

			this.insertItem(data);
		},
		openBarcodeWindow   : function(){
			this.set("barcodeVisible", true);
		},
		closeBarcodeWindow  : function(){
			this.set("barcodeVisible", false);
		},
		insertItem      : function(data){
			var obj = this.get("obj"),
				rate = obj.rate / banhji.source.getRate(data.locale, new Date(obj.issued_date));

			var item_price = {
				measurement_id  : data.measurement_id,
				conversion_ratio: 1,
				measurement     : data.measurement.name
			};

			this.lineDS.insert(0, {
				transaction_id      : obj.id,
				tax_item_id         : 0,
				item_id             : data.id,
				assembly_id         : 0,
				measurement_id      : data.measurement_id,
				description         : data.purchase_description,
				quantity            : 1,
				conversion_ratio    : 1,
				cost                : 0,
				price               : 0,
				amount              : 0,
				discount            : 0,
				discount_percentage : 0,
				tax                 : 0,
				rate                : rate,
				locale              : data.locale,
				movement            : 1,
				reference_no        : "",

				item                : data,
				item_price          : item_price,
				tax_item            : { id:"", name:"" },
				wht_account         : { id:"", name:"" }
			});
		},
		//Deposit
		loadDeposit         : function(){
			var self = this, obj = this.get("obj");

			//Deposits on Edit Mode
			if(this.get("isEdit")){
				this.depositDS.filter([
					{ field:"type", value:"Vendor_Deposit" },
					{ field:"reference_id", value:obj.id }
				]);
			}

			if(obj.contact_id>0){
				this.txnDS.query({
					filter:[
						{ field:"amount", operator:"select_sum", value:"amount" },
						{ field:"contact_id", value: obj.contact_id },
						{ field:"type", value: "Vendor_Deposit" }
					]
				}).then(function(){
					var view = self.txnDS.view();

					self.set("total_deposit", view[0].amount + obj.deposit);
				});
			}
		},
		addDeposit          : function(id){
			var obj = this.get("obj");

			this.depositDS.data([]);

			if(obj.deposit>0){
				this.depositDS.add({
					contact_id          : obj.contact_id,
					reference_id        : id,
					user_id             : this.get("user_id"),
					type                : "Vendor_Deposit",
					amount              : obj.deposit*-1,
					rate                : obj.rate,
					locale              : obj.locale,
					issued_date         : obj.issued_date
				});
			}
		},
		saveDeposit         : function(id){
			var obj = this.get("obj");

			if(this.get("isEdit")){
				if(this.depositDS.total()>0){
					var deposit = this.depositDS.at(0);
					deposit.set("amount", obj.deposit*-1);
				}else{
					this.addDeposit(id);
				}
			}else{
				this.addDeposit(id);
			}

			this.depositDS.sync();
		},
		//Contact
		setContact          : function(contact){
			var obj = this.get("obj");

			obj.set("contact", contact);
			this.contactChanges();
		},
		contactChanges      : function(){
			var self = this, obj = this.get("obj");

			if(obj.contact){
				var contact = obj.contact;

				obj.set("contact_id", contact.id);                
				obj.set("payment_term_id", contact.payment_term_id);
				obj.set("payment_method_id", contact.payment_method_id);
				obj.set("locale", contact.locale);
				obj.set("bill_to", contact.bill_to);
				obj.set("ship_to", contact.ship_to);

				if(obj.type=="Credit_Purchase"){
					obj.set("account_id", contact.account_id);
				}

				this.setRate();
				this.loadDeposit();
			}

			this.changes();
		},
		//Currency Rate
		setRate             : function(){
			var obj = this.get("obj"),
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});
		},
		//Item
		addItem             : function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);
			row.set("description", item.purchase_description);
			row.set("rate", rate);
			row.set("locale", item.locale);

			//Item base price
			var item_price = {
				measurement_id  : item.measurement_id,
				conversion_ratio: 1,
				measurement     : item.measurement.name
			};
			row.set("item_price", item_price);
		},
		addItemCatalog      : function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

			var catalogList = [];
			$.each(item.catalogs, function(index, value){
				catalogList.push(value);
			});

			this.itemDS.query({
				filter: { field:"id", operator:"where_in", value: catalogList }
			}).then(function(){
				var view = self.itemDS.view();

				$.each(view, function(index, value){
					var rate = obj.rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id      : obj.id,
						tax_item_id         : 0,
						item_id             : value.id,
						measurement_id      : 0,
						description         : value.sale_description,
						quantity            : 1,
						conversion_ratio    : 1,
						cost                : 0,
						price               : 0,
						amount              : 0,
						discount            : 0,
						rate                : rate,
						locale              : value.locale,
						movement            : 1,

						discount_percentage : 0,
						item                : value,
						measurement         : { measurement_id:"", measurement:"" },
						tax_item            : { id:"", name:"" },
						wht_account         : { id:"", name:"" }
					});
				});

			});
		},
		addRow          	: function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id      : obj.id,
				tax_item_id         : "",
				wht_account_id      : "",
				item_id             : "",
				measurement_id      : 0,
				description         : "",
				quantity            : 1,
				conversion_ratio    : 1,
				cost                : 0,
				amount              : 0,
				discount            : 0,
				rate                : obj.rate,
				locale              : obj.locale,
				additional_cost     : 0,
				additional_applied  : false,
				movement            : 1,
				reference_no        : "",

				discount_percentage : 0,
				item                : { id:"", name:"" },
				item_price          : { measurement_id:"", measurement:"" },
				tax_item            : { id:"", name:"" },
				wht_account         : { id:"", name:"" }
			});
		},
		addRowSelectedItem  : function(e){
			var self = this,
				obj = this.get("obj"),
				item = e.data,
				notExist = true;

			//Check exist item            
            $.each(this.lineDS.data(), function(index, value){
                if(value.item_id==item.id){
                    notExist = false;

                    value.set("quantity", value.quantity+1);

                    self.changes();

                    return false;
                }
            });

            if(notExist){			
				this.lineDS.add({
					transaction_id      : obj.id,
					tax_item_id         : "",
					wht_account_id      : "",
					item_id             : item.id,
					measurement_id      : item.measurement.measurement_id,
					description         : item.purchase_description,
					quantity            : 1,
					conversion_ratio    : 1,
					cost                : 0,
					amount              : 0,
					discount            : 0,
					rate                : obj.rate,
					locale              : obj.locale,
					additional_cost     : 0,
					additional_applied  : false,
					movement            : 1,
					reference_no        : "",
					discount_percentage : 0,
					item                : item,
					item_price          : item.measurement,
					tax_item            : { id:"", name:"" },
					wht_account         : { id:"", name:"" }
				});
			}
		},
		addExtraRow         : function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeRow           : function(e){
			var d = e.data;

			this.lineDS.remove(d);
			this.changes();
		},
		removeEmptyRow      : function(){
			var row, i;

			//Item
			var item = this.lineDS.data();
			for(i=item.length-1; i>=0; i--){
				row = item[i];

				if (row.item_id==0) {
					this.lineDS.remove(row);
				}
			}
		},
		itemLineDSChanges   : function(arg){
			var self = banhji.purchaseDashBoard;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					// self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity" || arg.field=="cost" || arg.field=="discount" || arg.field=="additional_applied"){
					self.changes();
				}else if(arg.field=="item_price"){
					var dataRow = arg.items[0];

					dataRow.set("measurement_id", dataRow.item_price.measurement_id);
					dataRow.set("conversion_ratio", dataRow.item_price.conversion_ratio);
				}else if(arg.field=="discount_percentage"){
					var dataRow = arg.items[0],
						percentageAmount = dataRow.quantity * dataRow.cost * dataRow.discount_percentage;

					dataRow.set("discount", percentageAmount);
				}else if(arg.field=="tax_item"){
					var dataRow = arg.items[0];

					dataRow.set("tax_item_id", dataRow.tax_item.id);
					dataRow.set("tax", 0);

					self.changes();
				}else if(arg.field=="wht_account"){
					var dataRow = arg.items[0];

					dataRow.set("wht_account_id", dataRow.wht_account.id);

					self.changes();
				}
			}
		},
		//Number
		checkExistingNumber : function(){
			var self = this, para = [],
			obj = this.get("obj");

			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}

				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();

					if(view.length>0){
						self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber      : function(){
			var self = this, obj = this.get("obj"),
				issueDate = new Date(obj.issued_date),
				startDate = new Date(obj.issued_date),
				endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.numberDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				]
			}).then(function(){
				var view = self.numberDS.view(),
				number = 0, str = "";

				if(view.length>0){
					number = view[0].number.match(/\d+/g).map(Number);
				}

				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

				obj.set("number", str);
			});
		},
		setStatus           : function(){
			var self = this,
				obj = this.get("obj"),
				statusObj = this.get("statusObj");

			statusObj.set("text", "");
			statusObj.set("date", "");
			statusObj.set("number", "");
			statusObj.set("url", "");

			switch(obj.status) {
				case 0:
					statusObj.set("text", "open");
					break;
				case 1:
					statusObj.set("text", "paid");

					this.txnDS.query({
						filter:{ field:"reference_id", value: obj.id },
						sort: { field:"issued_date", dir:"desc" },
						page:1,
						pageSize:1
					}).then(function(){
						var view = self.txnDS.view();

						if(view.length>0){
							statusObj.set("date", kendo.toString(new Date(view[0].issued_date), "dd-MM-yyyy h:mm:ss tt"));
							statusObj.set("number", view[0].number);

							var url = "#/" + view[0].type.toLowerCase() + "/" + view[0].id;
							statusObj.set("url", url);
						}
					});
					break;
				case 2:
					statusObj.set("text", "partialy paid");
					break;
				case 4:
					statusObj.set("text", "draft");
					break;
				default:
					//Default here
			}
		},
		//Obj
		loadObj             : function(id){
			var self = this, para = [], referenceIds = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.dataSource.view();

					if(view[0].type=="Cash_Purchase"){
						self.set("isCash", true);

						self.accountDS.filter({ field: "account_type_id", value: 10 });
					}else{
						self.set("isCash", false);

						self.accountDS.filter({ field: "account_type_id", value: 23 });
					}

					self.set("obj", view[0]);
					self.set("total", kendo.toString(view[0].amount, "c2", view[0].locale));
					self.set("amount_due", kendo.toString(view[0].amount - view[0].deposit, "c", view[0].locale));
					self.set("additional_cost", kendo.toString(view[0].additional_cost, "c", view[0].locale));
					self.setStatus();

					self.lineDS.query({
						filter: { field: "transaction_id", value: id }
					});

					self.accountLineDS.query({
						filter: { field: "transaction_id", value: id }
					});

					self.journalLineDS.query({
						filter: { field: "transaction_id", value: id }
					});

					self.attachmentDS.filter({ field: "transaction_id", value: id });

					//Additional Cost
					var additionalCostPara = [];
					if(view[0].is_recurring=="1"){
						additionalCostPara.push({ field: "is_recurring", value: 1 });
					}
					additionalCostPara.push({ field: "reference_id", value: id });
					additionalCostPara.push({ field: "type", operator:"where_in", value: ["Cash_Purchase","Credit_Purchase"] });
					self.additionalCostDS.filter(additionalCostPara);

					//Segment
					var segments = [];
					$.each(view[0].segments, function(index, value){
						segments.push(value);
					});
					self.segmentItemDS.query({
						filter: { field: "id", operator:"where_in", value: segments }
					});

					self.loadDeposit();
					self.loadReference();
				});
			}
		},
		changes             : function(){
			var self = this, obj = this.get("obj"),
				total = 0, subTotal = 0, discount = 0, tax = 0,
				remaining = 0, amount_due = 0;

			//Item Line
			$.each(this.lineDS.data(), function(index, value) {
				var amt = value.quantity * value.cost;
				subTotal += amt;

				//Discount by line
				if(value.discount>0){
					amt -= value.discount;
					discount += value.discount;
				}

				//Tax by line
				if(value.tax_item_id>0){
					var taxAmount = amt * value.tax_item.rate;

					if(banhji.source.checkWHT(value.tax_item.tax_type_id) && value.wht_account_id==0){
						tax -= taxAmount;
					}else{
						tax += taxAmount;
					}

					value.set("tax", taxAmount);
				}else{
					value.set("tax", 0);
				}

				value.set("amount", amt);
			});

			//Total
			total = (subTotal + tax) - discount;

			//Apply Deposit
			if(obj.deposit>0){
				if(obj.deposit <= this.get("total_deposit")){
					if(obj.deposit <= total){
						remaining = total - obj.deposit;
					}else{
						obj.set("deposit", total);
					}
				}else{
					alert("Over deposit to apply!");
					obj.set("deposit", 0);
				}

				//Status
				if(remaining==0){
					obj.set("status", 1);
				}else if(remaining==total){
					obj.set("status", 0);
				}else{
					obj.set("status", 2);
				}
			}

			//Warning over credit allowed
			if(obj.credit_allowed>0 && total>obj.credit_allowed){
				this.set("amtDueColor", "Gold");
			}else{
				this.set("amtDueColor", banhji.source.amtDueColor);
			}

			amount_due = total - obj.deposit;

			obj.set("sub_total", subTotal);
			obj.set("discount", discount);
			obj.set("tax", tax);
			obj.set("amount", total);
			obj.set("remaining", remaining);

			this.set("total", kendo.toString(total, "c2", obj.locale));
			this.set("amount_due", kendo.toString(amount_due, "c2", obj.locale));
		},
		typeChanges         : function(){
			var obj = this.get("obj");
			if(obj.type=="Cash_Purchase"){
				this.set("isCash", true);
				this.accountDS.filter({ field:"account_type_id", value: 10 });
				obj.set("account_id", 0);
				obj.set("account_id", 7);
			}else{
				this.set("isCash", false);
				this.accountDS.filter({ field: "account_type_id", value: 23 });
				obj.set("account_id", 0);
				obj.set("account_id", obj.contact.account_id);
			}
			this.generateNumber();
		},
		addEmpty            : function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.journalLineDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);
			this.set("amount_due", 0);
			this.set("amtDueColor", banhji.source.amtDueColor);

			//Set Date
			var duedate = new Date();
			duedate.setDate(duedate.getDate() + 30);

			this.dataSource.insert(0, {
				transaction_template_id : 31,
				account_id          : 7,
				contact_id          : 0,
				payment_term_id     : 0,
				payment_method_id   : 0,
				reference_id        : "",
				recurring_id        : "",
				job_id              : 0,
				user_id             : this.get("user_id"),
				type                : "Cash_Purchase", //Required
				nature_type 		: "Purchase",
				number              : "",
				sub_total           : 0,
				discount            : 0,
				tax                 : 0,
				amount              : 0,
				deposit             : 0,
				remaining           : 0,
				credit_allowed      : 0,
				additional_cost     : 0,
				additional_apply    : "Equal",
				rate                : 1,
				movement 			: 1,
				locale              : banhji.locale,
				issued_date         : new Date(),
				bill_date           : new Date(),
				due_date            : duedate,
				bill_to             : "",
				ship_to             : "",
				memo                : "",
				memo2               : "",
				status              : 0,
				reference_no        : "",
				check_no            : "",
				segments            : [],
				is_journal          : 1,
				//Recurring
				recurring_name      : "",
				start_date          : new Date(),
				frequency           : "Daily",
				month_option        : "Day",
				interval            : 1,
				day                 : 1,
				week                : 0,
				month               : 0,
				is_recurring        : 0,

				contact             : { id:0, name:"" },
				references          : []
			});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.typeChanges();
			this.generateNumber();

			//Default rows
			// for (var i = 0; i < banhji.source.defaultLines; i++) {
			//     this.addRow();
			//     this.addRowAccount();
			// }
		},
		objSync             : function(){
			var dfd = $.Deferred();

			this.dataSource.sync();
			this.dataSource.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		},
		save                : function(){
			var self = this, obj = this.get("obj");

			obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
			obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));
			obj.set("bill_date", kendo.toString(new Date(obj.bill_date), "yyyy-MM-dd"));

			//Warning over credit allowed
			if(obj.credit_limit>0 && obj.amount>obj.credit_allowed){
				alert("Over credit allowed!");
			}

			this.removeEmptyRow();

			//Save Draft
			if(this.get("saveDraft")){
				obj.set("status", 4); //In progress
				obj.set("progress", "Draft");
				obj.set("is_journal", 0);//No Journal
			}

			//Edit Mode
			if(obj.isNew()==false){
				//Use draft
				if(obj.status==4){
					obj.set("status", 0);//Open
					obj.set("progress", "");
					obj.set("is_journal", 1);//Add Journal
				}
			}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});
				}

				//Journal
				if(data[0].is_recurring==0 && data[0].is_journal==1){
					self.addJournal(data[0].id);
					self.saveDeposit(data[0].id);
				}

				self.lineDS.sync();

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.clear();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		clear               : function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();

			this.dataSource.data([]);
			this.lineDS.data([]);

			banhji.userManagement.removeMultiTask("purchase");
		},
		cancel              : function(){
			this.clear();
			window.history.back();
		},
		delete              : function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);

			this.txnDS.query({
				filter:[
					{ field:"reference_id", value:obj.id },
				],
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view();

				if(view.length>0){
					alert("Sorry, you can not delete it.");
				}else{
					obj.set("deleted", 1);
					self.dataSource.sync();
					self.dataSource.bind("requestEnd", function(e){
						if(e.type==="update"){
							window.history.back();
						}
					});
				}
			});
		},
		openConfirm         : function(){
			this.set("showConfirm", true);
		},
		closeConfirm        : function(){
			this.set("showConfirm", false);
		},
		validating          : function(){
			var result = true, obj = this.get("obj");

			if(obj.contact_id==0){
				$("#ntf1").data("kendoNotification").warning("Please select a supplier.");

				result = false;
			}

			if(this.lineDS.total()==0 && this.accountLineDS.total()==0){
				$("#ntf1").data("kendoNotification").warning("Please select an item or account.");

				result = false;
			}

			return result;
		},
		//Journal
		addJournal          : function(transaction_id){
			var self = this,
				obj = this.get("obj"),
				contact = obj.contact,
				raw = "", entries = {};

			//Edit Mode
			if(obj.isNew()==false){
				//Delete previous journal
				$.each(this.journalLineDS.data(), function(index, value){
					value.set("deleted", 1);
				});
			}

			//Item lines
			$.each(this.lineDS.data(), function(index, value){
				var item = value.item;

				//Service on Dr
				var serviceID = kendo.parseInt(item.expense_account_id);
				if(serviceID>0 && item.item_type_id==4){
					raw = "dr"+serviceID;

					var serviceAmount = (value.quantity*value.conversion_ratio*value.cost) + value.additional_cost;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : serviceID,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : serviceAmount,
							cr                  : 0,
							rate                : value.rate,
							locale              : item.locale
						};
					}else{
						entries[raw].dr += serviceAmount;
					}
				}

				//Inventory on Dr
				var inventoryID = kendo.parseInt(item.inventory_account_id);
				if(inventoryID>0){
					raw = "dr"+inventoryID;

					var inventoryAmount = (value.quantity*value.conversion_ratio*value.cost) + value.additional_cost;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : inventoryID,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : inventoryAmount,
							cr                  : 0,
							rate                : value.rate,
							locale              : item.locale
						};
					}else{
						entries[raw].dr += inventoryAmount;
					}
				}

				//Tax on Dr
				if(value.tax_item_id>0){
					var taxItem = value.tax_item,
						raw = "dr"+taxItem.account_id,
						taxAmt = value.amount * taxItem.rate;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : taxItem.account_id,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : taxAmt,
							cr                  : 0,
							rate                : obj.rate,
							locale              : obj.locale
						};
					}else{
						entries[raw].dr += taxAmt;
					}
				}
			});

			//Obj Account on Cr
			var objAccountID = kendo.parseInt(obj.account_id);
			if(objAccountID>0){
				raw = "cr"+objAccountID;

				var objAmount = obj.amount - obj.deposit;
				if(entries[raw]===undefined){
					entries[raw] = {
						transaction_id      : transaction_id,
						account_id          : objAccountID,
						contact_id          : obj.contact_id,
						description         : obj.memo,
						reference_no        : obj.reference_no,
						segments            : obj.segments,
						dr                  : 0,
						cr                  : objAmount,
						rate                : obj.rate,
						locale              : obj.locale
					};
				}else{
					entries[raw].cr += objAmount;
				}
			}

			//Discount on Cr
			if(obj.discount > 0){
				var discountAccountId = kendo.parseInt(contact.trade_discount_id);
				if(discountAccountId>0){
					raw = "cr"+discountAccountId;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : discountAccountId,
							contact_id          : obj.contact_id,
							description         : obj.memo,
							reference_no        : obj.reference_no,
							segments            : obj.segments,
							dr                  : 0,
							cr                  : obj.discount,
							rate                : obj.rate,
							locale              : obj.locale
						};
					}else{
						entries[raw].cr += obj.discount;
					}
				}
			}

			//Deposit on Cr
			if(obj.deposit > 0){
				var depositAccountId = kendo.parseInt(contact.deposit_account_id);
				if(depositAccountId>0){
					raw = "cr"+depositAccountId;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : depositAccountId,
							contact_id          : obj.contact_id,
							description         : obj.memo,
							reference_no        : obj.reference_no,
							segments            : obj.segments,
							dr                  : 0,
							cr                  : obj.deposit,
							rate                : obj.rate,
							locale              : obj.locale
						};
					}else{
						entries[raw].cr += obj.deposit;
					}
				}
			}

			//Add to journal entry
			if(!jQuery.isEmptyObject(entries)){
				$.each(entries, function(index, value){
					self.journalLineDS.add(value);
				});
			}

			this.journalLineDS.sync();
		},
		//POP
		itemDS             : new kendo.data.DataSource({
			transport: {
				read: {
					url: apiUrl + "items",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if (operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {
							models: kendo.stringify(options.models)
						};
					}
				}
			},
			schema: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			filter: [
				{
					field: "item_type_id",
					operator: "where_in",
					value: [1, 4]
				}
			],
			sort: {
				field: "id",
				dir: "asc"
			},
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page: 1,
			pageSize: 8
		}),
		searchItemByCategory: function(e){
			var data = e.data;
			var self = this;
			$("#loading").css("display", "block");
			this.itemDS.query({
				filter: {field: "category_id", value: data.id},
				page: 1,
				pageSize: 8,
			}).then(function(e){
				$("#loading").css("display", "none");
				if(self.itemDS.data().length > 0){
					self.set("haveItems", true);
				}else{
					alert('មិនមានទិន្ន័យ (No Data)!');
				}
			});
		},
		backCategory    : function(){
			this.set("haveItems", false);
		},
		saveNew2             : function(e){
			this.set("saveNew", true);
			this.set("saveDraft", false);
			this.set("saveClose", false);
			this.set("savePrint", false);
			var obj = this.get("obj");
			if(obj.account_id && obj.contact_id && this.lineDS.data().length > 0){
				this.save();
			}else{
				superChoeunNTF('error', this.lang.lang.error_input);
			}
		},
		savePrint2           : function(e){
			this.set("saveNew", false);
			this.set("saveDraft", false);
			this.set("saveClose", false);
			this.set("savePrint", true);
			var obj = this.get("obj");
			if(obj.account_id && obj.contact_id && this.lineDS._total > 0){
				this.save();
			}else{
				superChoeunNTF('error', this.lang.lang.error_input);
			}
		},
		cashClick           : function(e){
			$('.module-active').removeClass('module-active');
			$('.cashmodule').addClass('module-active');
			this.get("obj").set("type", "Cash_Purchase");
			this.typeChanges();
		},
		creditClick         : function(e){
			$('.module-active').removeClass('module-active');
			$('.creditmodule').addClass('module-active');
			this.get("obj").set("type", "Credit_Purchase");
			this.typeChanges();
		}
	});
	function superChoeunNTF(module, message){
		var it = $('#supercheoun-ntf');
		it.css("right", "-800px");
		it.css({
			"padding": "10px", 
			"color": "#fff", 
			"position": "fixed", 
			"bottom": "20%", 
			"box-shadow": "3px 3px #888888",
			"z-index": "9999"
		});
		it.animate({right: '0px'});
		if(module == 'success'){
			it.css("background", "#4CAF50");
			it.children(".message").html("<p style='margin: 0px;'>"+message+"</p>");
		}else{
			it.css("background", "#be1e2d");
			it.children(".message").html("<p style='margin: 0px;'>"+message+"</p>");
		}
		var i = 5;
		var x = setInterval(function() {
			it.children(".second").html(i);
			i -= 1;
			if(i == 0){
				it.animate({right: '-800px'});
				clearInterval(x);
			}
		}, 1000);
	}
	banhji.purchaseReturn =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "transactions"),
		referenceDS         : dataStore(apiUrl + "transactions"),
		returnDS            : dataStore(apiUrl + "transactions"),
		txnDS               : dataStore(apiUrl + "transactions"),
		numberDS            : dataStore(apiUrl + "transactions/number"),
		lineDS              : dataStore(apiUrl + "item_lines"),
		assemblyLineDS      : dataStore(apiUrl + "item_lines"),
		accountLineDS       : dataStore(apiUrl + "account_lines"),
		journalLineDS       : dataStore(apiUrl + "journal_lines"),
		assemblyDS          : dataStore(apiUrl + "item_prices"),
		attachmentDS        : dataStore(apiUrl + "attachments"),
		jobDS               : new kendo.data.DataSource({
			data: banhji.source.jobList,
			sort: { field: "name", dir: "asc" }
		}),
		segmentItemDS       : new kendo.data.DataSource({
			data: banhji.source.segmentItemList,
			sort: [
				{ field: "segment_id", dir: "asc" },
				{ field: "code", dir: "asc" }
			]
		}),
		itemDS              : new kendo.data.DataSource({
			transport: {
				read    : {
					url: apiUrl + "items",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema  : {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			filter:{ field: "is_assembly <>", value: 1 },
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		taxItemDS           : new kendo.data.DataSource({
			data: banhji.source.taxList,
			filter:{
				logic: "or",
				filters: [
					{ field: "tax_type_id", value: 1 },//Supplier Tax
					{ field: "tax_type_id", value: 2 },
					{ field: "tax_type_id", value: 3 },
					{ field: "tax_type_id", value: 9 }
				]
			},
			sort: [
				{ field: "tax_type_id", dir: "asc" },
				{ field: "name", dir: "asc" }
			]
		}),
		accountDS           : new kendo.data.DataSource({
			data: banhji.source.accountList,
			filter:[
				{ field: "account_type_id", operator:"gte", value: 35 },
				{ field: "account_type_id", operator:"lte", value: 43 }
			],
			sort: { field:"number", dir:"asc" }
		}),
		depositAccountDS    : new kendo.data.DataSource({
			data: banhji.source.accountList,
			filter: {
				logic: "or",
				filters: [
					{ field: "account_type_id", value: 14 },
					{ field: "account_type_id", value: 21 }
				]
			},
			sort: { field:"number", dir:"asc" }
		}),
		txnTemplateDS       : new kendo.data.DataSource({
			data: banhji.source.txnTemplateList,
			filter:{ field: "type", value: "Purchase_Return" }
		}),
		contactDS           : banhji.source.supplierDS,
		amtDueColor         : banhji.source.amtDueColor,
		obj                 : null,
		returnObj           : null,
		isEdit              : false,
		saveClose           : false,
		savePrint           : false,
		statusSrc           : "",
		showRef             : false,
		showSegment         : false,
		windowVisible       : false,
		isOffsetInvoice     : false,
		notDuplicateNumber  : true,
		total               : 0,
		user_id             : banhji.source.user_id,
		pageLoad            : function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Upload
		onSelect            : function(e){
			// Array with information about the uploaded files
			var self = this,
			files = e.files,
			obj = this.get("obj");

			// Check the extension of each file and abort the upload if it is not .jpg
			$.each(files, function(index, value){
				if (value.extension.toLowerCase() === ".jpg"
					|| value.extension.toLowerCase() === ".jpeg"
					|| value.extension.toLowerCase() === ".tiff"
					|| value.extension.toLowerCase() === ".png"
					|| value.extension.toLowerCase() === ".gif"
					|| value.extension.toLowerCase() === ".pdf"){

					var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

					self.attachmentDS.add({
						user_id         : self.get("user_id"),
						transaction_id  : obj.id,
						type            : "Transaction",
						name            : value.name,
						description     : "",
						key             : key,
						url             : banhji.s3 + key,
						size            : value.size,
						created_at      : new Date(),

						file            : value.rawFile
					});
				}else{
					alert("This type of file is not allowed to attach.");
				}
			});
		},
		onRemove            : function(e){
			// Array with information about the uploaded files
			var self = this, files = e.files;
			$.each(this.attachmentDS.data(), function(index, value){
				if(value.name==files[0].name){
					self.attachmentDS.remove(value);

					return false;
				}
			});
		},
		removeFile          : function(e){
			var data = e.data;

			if (confirm("Are you sure, you want to delete it?")) {
				this.attachmentDS.remove(data);
			}
		},
		uploadFile          : function(){
			var self = this;

			$.each(this.attachmentDS.data(), function(index, value){
				if(!value.id){
					var params = {
						Body: value.file,
						Key: value.key
					};
					bucket.upload(params, function (err, data) {
						// console.log(err, data);
						// var url = data.Location;
					});
				}
			});

			this.attachmentDS.sync();
			var saved = false;
			this.attachmentDS.bind("requestEnd", function(e){
				if(e.type=="destroy"){
					if(saved==false){
						saved = true;

						var response = e.response.results;
						$.each(response, function(index, value){
							var paramz = {
								//Bucket: 'STRING_VALUE', /* required */
								Delete: { /* required */
									Objects: [ /* required */
										{
											Key: value.data.key /* required */
										}
									  /* more items */
									]
								}
							};
							bucket.deleteObjects(paramz, function(err, data) {
								//console.log(err, data);
							});
						});
					}
				}
			});

			//Clear upload files
			$(".k-upload-files").remove();
		},
		//Contact
		setContact          : function(contact){
			var obj = this.get("obj");

			obj.set("contact", contact);
			this.contactChanges();
		},
		contactChanges      : function(){
			var self = this, obj = this.get("obj");

			if(obj.contact){
				var contact = obj.contact;

				obj.set("contact_id", contact.id);
				obj.set("locale", contact.locale);
				obj.set("bill_to", contact.bill_to);
				obj.set("ship_to", contact.ship_to);

				this.setRate();
			}

			this.changes();
		},
		//Currency Rate
		setRate             : function(){
			var obj = this.get("obj"),
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

			obj.set("rate", rate);

			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));

				value.set("rate", itemRate);
			});
		},
		//Segment
		segmentChanges      : function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);

			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		//Item
		itemChanges         : function(e){
			var self = this, data = e.data, obj = this.get("obj");

			if(data.item_id>0){
				var item = this.itemDS.get(data.item_id);

				if(item.is_catalog=="1"){
					this.lineDS.remove(data);

					$.each(item.catalogs, function(ind, val){
						var catalogItem = self.itemDS.get(val);

						if(catalogItem){
							var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date)),
								itemPrices = banhji.source.getPriceList(catalogItem.id);

							self.lineDS.add({
								transaction_id      : obj.id,
								tax_item_id         : 0,
								item_id             : catalogItem.id,
								measurement_id      : itemPrices.length>0 ? itemPrices[0].measurement_id : catalogItem.measurement_id,
								description         : catalogItem.purchase_description,
								quantity            : 1,
								conversion_ratio    : itemPrices.length>0 ? itemPrices[0].conversion_ratio : 1,
								cost                : catalogItem.cost * rate,
								amount              : 0,
								discount            : 0,
								rate                : rate,
								locale              : catalogItem.locale,
								movement            : -1,

								item_prices         : itemPrices
							});
						}
					});

					this.changes();
				}else{
					var rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date)),
						itemPrices = banhji.source.getPriceList(data.item_id);

					data.set("item_prices", itemPrices);
					data.set("measurement_id", itemPrices.length>0 ? itemPrices[0].measurement_id : item.measurement_id);
					data.set("description", item.purchase_description);
					data.set("quantity", 1);
					data.set("conversion_ratio", itemPrices.length>0 ? itemPrices[0].conversion_ratio : 1);
					data.set("cost", item.cost * rate);
					data.set("rate", rate);
					data.set("locale", item.locale);

					this.changes();
				}
			}else{
				data.set("item_id", "");
			}
		},
		measurementChanges  : function(e){
			var data = e.data, obj = this.get("obj");

			if(data.measurement_id>0){
				$.each(data.item_prices, function(index, value){
					if(value.measurement_id==data.measurement_id){

						data.set("conversion_ratio", value.conversion_ratio);

						return false;
					}
				});

				this.changes();
			}
		},
		//Account
		addRowAccount       : function(){
			var obj = this.get("obj");

			this.accountLineDS.add({
				transaction_id      : obj.id,
				tax_item_id         : "",
				account_id          : "",
				description         : "",
				reference_no        : "",
				segments            : [],
				amount              : 0,
				rate                : obj.rate,
				locale              : obj.locale
			});
		},
		removeRowAccount    : function(e){
			var d = e.data;
			if(this.lineDS.total()==0 && this.accountLineDS.total()==0){

			}else{
				this.accountLineDS.remove(d);
				this.changes();
			}
		},
		//Number
		checkExistingNumber     : function(){
			var self = this, para = [],
			obj = this.get("obj");

			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}

				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();

					if(view.length>0){
						self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber      : function(){
			var self = this, obj = this.get("obj"),
				issueDate = new Date(obj.issued_date),
				startDate = new Date(obj.issued_date),
				endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.numberDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				]
			}).then(function(){
				var view = self.numberDS.view(),
				number = 0, str = "";

				if(view.length>0){
					number = view[0].number.match(/\d+/g).map(Number);
				}

				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

				obj.set("number", str);
			});
		},
		//Obj
		loadObj             : function(id){
			var self = this, para = [];

			para.push({ field:"id", value: id });

			this.dataSource.query({
				filter: para,
				page: 1,
				pageSize: 100
			}).then(function(e){
				var view = self.dataSource.view();

				self.set("obj", view[0]);
				self.set("statusSrc", banhji.source.usedSrc);
				self.set("total", kendo.toString(view[0].amount, "c", view[0].locale));

				self.loadLines(id);
				self.assemblyLineDS.filter([
					{ field: "transaction_id", value: id },
					{ field: "assembly_id >", value: 0 }
				]);
				self.accountLineDS.filter({ field: "transaction_id", value: id });
				self.journalLineDS.filter({ field: "transaction_id", value: id });
				self.attachmentDS.filter({ field: "transaction_id", value: id });
				self.returnDS.filter({ field: "return_id", value: id });
			});
		},
		loadLines           : function(id){
			var self = this;

			self.lineDS.query({
				filter: { field: "transaction_id", value: id }
			}).then(function(){
				var view = self.lineDS.view();

				$.each(view, function(index, value){
					value.set("item_prices", banhji.source.getPriceList(value.item_id));
				});
			});
		},
		changes             : function(){
			var self = this, obj = this.get("obj"),
			subTotal = 0, tax = 0, returnAmount = 0, remaining = 0, itemIds = [];

			//Item lines
			$.each(this.lineDS.data(), function(index, value) {
				var amt = value.quantity * value.cost;
				subTotal += amt;

				//Tax by line
				if(value.tax_item_id>0){
					var taxItem = self.taxItemDS.get(value.tax_item_id);
					tax += amt * taxItem.rate;
				}

				value.set("amount", amt);

				if(value.item_id>0){
					itemIds.push(value.item_id);
				}
			});

			//Account lines
			$.each(this.accountLineDS.data(), function(index, value) {
				subTotal += value.amount;
			});

			//Total
			total = subTotal + tax;

			//Return lines
			$.each(this.returnDS.data(), function(index, value) {
				if(value.type=="Offset_Bill" && value.amount>value.sub_total){
					value.set("amount", value.sub_total);
				}
				returnAmount += value.amount;
			});

			remaining = total - returnAmount;

			obj.set("sub_total", subTotal);
			obj.set("tax", tax);
			obj.set("amount", total);
			obj.set("deposit", returnAmount);
			obj.set("remaining", remaining);

			this.set("total", kendo.toString(total, "c", obj.locale));

			//Remove Assembly Item List
			var raw = this.assemblyLineDS.data();
			var item, i;
			for(i=raw.length-1; i>=0; i--){
				item = raw[i];

				if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
					this.assemblyLineDS.remove(item);
				}
			}
		},
		addEmpty            : function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.accountLineDS.data([]);
			this.assemblyLineDS.data([]);
			this.journalLineDS.data([]);
			this.returnDS.data([]);
			this.referenceDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);

			this.dataSource.insert(0, {
				contact_id          : "",
				reference_id        : "",
				recurring_id        : "",
				job_id              : 0,
				user_id             : this.get("user_id"),
				type                : "Purchase_Return", //Require
				number              : "",
				sub_total           : 0,
				discount            : 0,
				tax                 : 0,
				amount              : 0,
				deposit             : 0,
				amount_paid         : 0,
				remaining           : 0,
				rate                : 1,
				locale              : banhji.locale,
				issued_date         : new Date(),
				bill_to             : "",
				ship_to             : "",
				memo                : "",
				memo2               : "",
				status              : 0,
				segments            : [],
				is_journal          : 1,
				//Recurring
				recurring_name      : "",
				start_date          : new Date(),
				frequency           : "Daily",
				month_option        : "Day",
				interval            : 1,
				day                 : 1,
				week                : 0,
				month               : 0,
				is_recurring        : 0,

				contact             : { id:0, name:"" }
			});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);

			this.setRate();
			this.addRow();
			this.generateNumber();
		},
		addRow              : function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id      : obj.id,
				tax_item_id         : "",
				item_id             : "",
				measurement_id      : 0,
				description         : "",
				quantity            : 1,
				conversion_ratio            : 1,
				cost                : 0,
				amount              : 0,
				discount            : 0,
				fine                : 0,
				rate                : obj.rate,
				locale              : obj.locale,
				movement            : -1,
				reference_no        : "",

				item_prices         : []
			});
		},
		removeRow           : function(e){
			var data = e.data;

			//Remove Assembly Item List
			if(data.item_id>0){
				var raw = this.assemblyLineDS.data();

				var item, i;
				for(i=raw.length-1; i>=0; i--){
					item = raw[i];
					if (item.assembly_id==data.item_id){
						this.assemblyLineDS.remove(item);
					}

				}
			}

			this.lineDS.remove(data);
			this.changes();
		},
		objSync             : function(){
			var dfd = $.Deferred();

			this.dataSource.sync();
			this.dataSource.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		},
		save                : function(){
			var self = this, obj = this.get("obj");
			obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

			//Mode
			if(obj.isNew()==false){
				//Journal
				$.each(this.journalLineDS.data(), function(index, value){
					value.set("deleted", 1);
				});

				this.addJournal(obj.id);
			}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Account line
					$.each(self.accountLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Assembly Item line
					$.each(self.assemblyLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Journal
					self.addJournal(data[0].id);
				}

				self.lineDS.sync();
				self.accountLineDS.sync();
				self.assemblyLineDS.sync();
				self.uploadFile();

				//Return
				var ids = [];
				$.each(self.returnDS.data(), function(index, value){
					if(value.type=="Offset_Bill" && value.reference_id>0){
						ids.push(value.reference_id);
					}
					value.set("return_id", data[0].id);
					value.set("issued_date", kendo.toString(new Date(data[0].issued_date), "s"));
				});

				self.returnDS.sync();
				var saved = false;
				self.returnDS.bind("requestEnd", function(e){
					if(e.type=="create" && saved==false){
						saved = true;

						self.updateTxnStatus(ids);
					}
				});

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveClose")){
					//Save Close
					self.set("saveClose", false);
					self.cancel();
					window.history.back();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.cancel();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		cancel              : function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.accountLineDS.cancelChanges();
			this.assemblyLineDS.cancelChanges();
			this.attachmentDS.cancelChanges();

			this.dataSource.data([]);
			this.lineDS.data([]);
			this.accountLineDS.data([]);
			this.assemblyLineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("purchase_return");
		},
		validating          : function(){
			var result = true, obj = this.get("obj");

			if(kendo.parseFloat(obj.amount, "n3")!==kendo.parseFloat(obj.deposit, "n3")){
				$("#ntf1").data("kendoNotification").error("Remaining must be Zero!");

				result = false;
			}

			if(this.lineDS.total()==0 && this.accountLineDS.total()==0){
				$("#ntf1").data("kendoNotification").error("Please select an item or account.");

				result = false;
			}

			if(this.returnDS.total()==0){
				$("#ntf1").data("kendoNotification").error("Please make an offset bill or add to deposit.");

				result = false;
			}

			return result;
		},
		updateTxnStatus     : function(ids){
			var self = this;

			if(ids.length>0){
				this.txnDS.query({
					filter:{ field:"id", operator:"where_in", value:ids }
				}).then(function(){
					var view = self.txnDS.view();

					$.each(view, function(index, value){
						if(value.amount_paid == 0){
							value.set("status", 0);
						}else if(value.amount_paid >= value.amount){
							value.set("status", 1);
						}else{
							value.set("status", 2);
						}
					});

					self.txnDS.sync();
				});
			}
		},
		//Return
		addRowReturn        : function(type){
			var obj = this.get("obj"), account_id = 0;

			if(type=="Vendor_Deposit" && obj.contact_id>0){
				var contact = obj.contact;
				account_id = contact.deposit_account_id;
			}

			this.returnDS.insert(0, {
				return_id       : obj.id,
				account_id      : account_id,
				contact_id      : obj.contact_id,
				reference_id    : "",
				reference_no    : "",
				number          : "",
				type            : type,
				amount          : 0,
				rate            : obj.rate,
				locale          : obj.locale,
				issued_date     : obj.issued_date
			});

			var raw = this.returnDS.at(0);
			this.set("returnObj", raw);
		},
		selectedRow         : function(e){
			var data = e.data, para = [], ids = [], obj = this.get("obj");

			this.set("returnObj", data);

			if(data.type=="Offset_Bill"){
				this.set("isOffsetInvoice", true);

				if(this.returnDS.total()>0){
					$.each(this.returnDS.data(), function(index, value){
						if(value.reference_id!==data.reference_id){
							ids.push(value.reference_id);
						}
					});
					para.push({field: "id", operator:"where_not_in", value: ids});
				}
				para.push({field: "contact_id", value: obj.contact_id});
				para.push({field: "status", operator:"where_in", value: [0,2]});
				para.push({field: "type", value:"Credit_Purchase"});
				this.referenceDS.filter(para);
			}else{
				this.set("isOffsetInvoice", false);
			}

			this.set("windowVisible", true);
		},
		removeRowReturn     : function(e){
			var d = e.data;

			if(this.returnDS.total()>1){
				this.returnDS.remove(d);
				this.changes();
			}
		},
		returnChanges       : function(e){
			e.preventDefault();

			this.closeWindow();
		},
		referenceChanges    : function(){
			var returnObj = this.get("returnObj");

			if(returnObj.reference_id>0){
				var txn = this.referenceDS.get(returnObj.reference_id),
				amount = txn.amount - (txn.amount_paid + txn.deposit);

				returnObj.set("account_id", txn.account_id);
				returnObj.set("reference_no", txn.number);
				returnObj.set("sub_total", amount);
				returnObj.set("amount", amount);
			}else{
				returnObj.set("account_id", 0);
				returnObj.set("reference_no", "");
				returnObj.set("sub_total", 0);
				returnObj.set("amount", 0);
			}

			this.changes();
		},
		openOffsetInvoiceWindow : function(){
			this.openWindow("Offset_Bill");
		},
		openDepositWindow   : function(){
			this.openWindow("Vendor_Deposit");
		},
		openWindow          : function(type){
			var para = [], ids = [],
			obj = this.get("obj");

			if(obj.contact_id>0){
				this.addRowReturn(type);

				if(type=="Offset_Bill"){
					this.set("isOffsetInvoice", true);

					if(this.returnDS.total()>0){
						$.each(this.returnDS.data(), function(index, value){
							ids.push(value.reference_id);
						});
						para.push({field: "id", operator:"where_not_in", value: ids});
					}
					para.push({field: "contact_id", value: obj.contact_id});
					para.push({field: "status", operator:"where_in", value: [0,2]});
					para.push({field: "type", value:"Credit_Purchase"});
					this.referenceDS.filter(para);
				}else{
					this.set("isOffsetInvoice", false);
				}

				this.set("windowVisible", true);
			}else{
				alert("Please select a customer.");
			}
		},
		closeWindow         : function(){
			this.changes();
			this.set("windowVisible", false);
		},
		cancelWindow        : function(){
			var returnObj = this.get("returnObj"),
			indexReturnObj = this.returnDS.indexOf(returnObj),
			selectedReturnObj = this.returnDS.at(indexReturnObj);

			this.returnDS.remove(selectedReturnObj);
			this.changes();

			this.set("windowVisible", false);
		},
		//Journal
		addJournal          : function(transaction_id){
			var self = this,
				obj = this.get("obj"),
				contact = obj.contact,
				raw = "", entries = {};

			//Item lines
			$.each(this.lineDS.data(), function(index, value){
				var item = self.itemDS.get(value.item_id);

				//Service on Cr
				if(item.item_type_id==4){
					var serviceID = kendo.parseInt(item.expense_account_id);
					if(serviceID>0){
						raw = "cr"+serviceID;

						var serviceAmount = value.amount;
						if(item.item_type_id==1 || item.item_type_id==4){
							serviceAmount = value.quantity * value.conversion_ratio * item.cost;
						}

						if(entries[raw]===undefined){
							entries[raw] = {
								transaction_id      : transaction_id,
								account_id          : serviceID,
								contact_id          : obj.contact_id,
								description         : value.description,
								reference_no        : "",
								segments            : obj.segments,
								dr                  : 0,
								cr                  : serviceAmount,
								rate                : value.rate,
								locale              : item.locale
							};
						}else{
							entries[raw].cr += serviceAmount;
						}
					}
				}

				//Inventory on Cr
				var inventoryID = kendo.parseInt(item.inventory_account_id);
				if(inventoryID>0){
					raw = "cr"+inventoryID;

					var inventoryAmount = value.amount;
					if(item.item_type_id==1 || item.item_type_id==4){
						inventoryAmount = value.quantity * value.conversion_ratio * value.cost;
					}

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : inventoryID,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : 0,
							cr                  : inventoryAmount,
							rate                : value.rate,
							locale              : item.locale
						};
					}else{
						entries[raw].cr += inventoryAmount;
					}
				}

				//Tax on Cr
				if(value.tax_item_id>0){
					var taxItem = self.taxItemDS.get(value.tax_item_id),
						raw = "cr"+taxItem.account_id,
						taxAmt = value.amount * taxItem.rate;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : taxItem.account_id,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : 0,
							cr                  : taxAmt,
							rate                : obj.rate,
							locale              : obj.locale
						};
					}else{
						entries[raw].cr += taxAmt;
					}
				}
			});

			//Return Lines
			$.each(this.returnDS.data(), function(index, value){
				//Add Offset Bill and Deposit list
				var returnID = kendo.parseInt(value.account_id);
				if(value.type=="Offset_Bill"){
					returnID = contact.account_id;
				}

				//A/P and Deposit on Dr
				if(returnID>0){
					raw = "dr"+returnID;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : returnID,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : value.amount,
							cr                  : 0,
							rate                : value.rate,
							locale              : value.locale
						};
					}else{
						entries[raw].dr += value.amount;
					}
				}
			});

			//Rebate Account on Cr
			$.each(this.accountLineDS.data(), function(index, value){
				var accountID = kendo.parseInt(value.account_id);
				if(accountID>0){
					raw = "cr"+accountID;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : accountID,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : value.segments,
							dr                  : 0,
							cr                  : value.amount,
							rate                : obj.rate,
							locale              : obj.locale
						};
					}else{
						entries[raw].cr += value.amount;
					}
				}
			});

			//Add to journal entry
			if(!jQuery.isEmptyObject(entries)){
				$.each(entries, function(index, value){
					self.journalLineDS.add(value);
				});
			}

			this.journalLineDS.sync();
		}
	});
	banhji.paymentRefund =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "transactions"),
		referenceDS         : dataStore(apiUrl + "transactions"),
		returnDS            : dataStore(apiUrl + "transactions"),
		txnDS               : dataStore(apiUrl + "transactions"),
		numberDS            : dataStore(apiUrl + "transactions/number"),
		lineDS              : dataStore(apiUrl + "item_lines"),
		assemblyLineDS      : dataStore(apiUrl + "item_lines"),
		journalLineDS       : dataStore(apiUrl + "journal_lines"),
		assemblyDS          : dataStore(apiUrl + "item_prices"),
		attachmentDS        : dataStore(apiUrl + "attachments"),
		jobDS               : new kendo.data.DataSource({
			data: banhji.source.jobList,
			sort: { field: "name", dir: "asc" }
		}),
		segmentItemDS       : new kendo.data.DataSource({
			data: banhji.source.segmentItemList,
			sort: [
				{ field: "segment_id", dir: "asc" },
				{ field: "code", dir: "asc" }
			]
		}),
		taxItemDS           : new kendo.data.DataSource({
			data: banhji.source.taxList,
			filter:{
				logic: "or",
				filters: [
					{ field: "tax_type_id", value: 1 },//Supplier Tax
					{ field: "tax_type_id", value: 2 },
					{ field: "tax_type_id", value: 3 },
					{ field: "tax_type_id", value: 9 }
				]
			},
			sort: [
				{ field: "tax_type_id", dir: "asc" },
				{ field: "name", dir: "asc" }
			]
		}),
		txnTemplateDS       : new kendo.data.DataSource({
			data: banhji.source.txnTemplateList,
			filter:{ field: "type", value: "Payment_Refund" }
		}),
		itemDS              : new kendo.data.DataSource({
			transport: {
				read    : {
					url: apiUrl + "items",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema  : {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			filter:{ field: "item_type_id <>", value: 3 },
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		accountDS           : new kendo.data.DataSource({
			data: banhji.source.accountList,
			filter:{ field:"account_type_id", value: 10 },
			sort: { field:"number", dir:"asc" }
		}),
		contactDS           : banhji.source.supplierDS,
		amtDueColor         : banhji.source.amtDueColor,
		obj                 : null,
		isEdit              : false,
		saveClose           : false,
		savePrint           : false,
		notDuplicateNumber  : true,
		total               : 0,
		total_deposit       : 0,
		user_id             : banhji.source.user_id,
		pageLoad            : function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Upload
		onSelect            : function(e){
			// Array with information about the uploaded files
			var self = this,
			files = e.files,
			obj = this.get("obj");

			// Check the extension of each file and abort the upload if it is not .jpg
			$.each(files, function(index, value){
				if (value.extension.toLowerCase() === ".jpg"
					|| value.extension.toLowerCase() === ".jpeg"
					|| value.extension.toLowerCase() === ".tiff"
					|| value.extension.toLowerCase() === ".png"
					|| value.extension.toLowerCase() === ".gif"
					|| value.extension.toLowerCase() === ".pdf"){

					var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001);

					self.attachmentDS.add({
						user_id         : self.get("user_id"),
						transaction_id  : obj.id,
						type            : "Transaction",
						name            : value.name,
						description     : "",
						key             : key,
						url             : banhji.s3 + key,
						size            : value.size,
						created_at      : new Date(),

						file            : value.rawFile
					});
				}else{
					alert("This type of file is not allowed to attach.");
				}
			});
		},
		onRemove            : function(e){
			// Array with information about the uploaded files
			var self = this, files = e.files;
			$.each(this.attachmentDS.data(), function(index, value){
				if(value.name==files[0].name){
					self.attachmentDS.remove(value);

					return false;
				}
			});
		},
		removeFile          : function(e){
			var data = e.data;

			if (confirm("Are you sure, you want to delete it?")) {
				this.attachmentDS.remove(data);
			}
		},
		uploadFile          : function(){
			var self = this;

			$.each(this.attachmentDS.data(), function(index, value){
				if(!value.id){
					var params = {
						Body: value.file,
						Key: value.key
					};
					bucket.upload(params, function (err, data) {
						// console.log(err, data);
						// var url = data.Location;
					});
				}
			});

			this.attachmentDS.sync();
			var saved = false;
			this.attachmentDS.bind("requestEnd", function(e){
				if(e.type=="destroy"){
					if(saved==false){
						saved = true;

						var response = e.response.results;
						$.each(response, function(index, value){
							var paramz = {
								//Bucket: 'STRING_VALUE', /* required */
								Delete: { /* required */
									Objects: [ /* required */
										{
											Key: value.data.key /* required */
										}
									  /* more items */
									]
								}
							};
							bucket.deleteObjects(paramz, function(err, data) {
								//console.log(err, data);
							});
						});
					}
				}
			});

			//Clear upload files
			$(".k-upload-files").remove();
		},
		//Deposit
		loadDeposit         : function(){
			var self = this, obj = this.get("obj");

			if(obj.contact_id>0){
				this.txnDS.query({
					filter:[
						{ field:"amount", operator:"select_sum", value:"amount" },
						{ field:"contact_id", value: obj.contact_id },
						{ field:"type", value: "Vendor_Deposit" }
					]
				}).then(function(){
					var view = self.txnDS.view();

					self.set("total_deposit", view[0].amount + obj.deposit);
				});
			}
		},
		//Contact
		setContact          : function(contact){
			var obj = this.get("obj");

			obj.set("contact", contact);
			this.contactChanges();
		},
		contactChanges      : function(){
			var self = this, obj = this.get("obj");

			if(obj.contact){
				var contact = obj.contact;

				obj.set("contact_id", contact.id);
				obj.set("locale", contact.locale);
				obj.set("bill_to", contact.bill_to);
				obj.set("ship_to", contact.ship_to);

				this.setRate();
				this.loadDeposit();
				this.loadReference();
			}

			this.changes();
		},
		//Currency Rate
		setRate             : function(){
			var obj = this.get("obj"),
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

			obj.set("rate", rate);

			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));

				value.set("rate", itemRate);
			});
		},
		//Segment
		segmentChanges      : function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);

			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		//Item
		itemChanges         : function(e){
			var self = this, data = e.data, obj = this.get("obj");

			if(data.item_id>0){
				var item = this.itemDS.get(data.item_id);

				if(item.is_catalog=="1"){
					this.lineDS.remove(data);

					$.each(item.catalogs, function(ind, val){
						var catalogItem = self.itemDS.get(val);

						if(catalogItem){
							var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date)),
								itemPrices = banhji.source.getPriceList(catalogItem.id);

							self.lineDS.add({
								transaction_id      : obj.id,
								tax_item_id         : 0,
								item_id             : catalogItem.id,
								measurement_id      : itemPrices.length>0 ? itemPrices[0].measurement_id : catalogItem.measurement_id,
								description         : catalogItem.purchase_description,
								quantity            : 1,
								conversion_ratio    : itemPrices.length>0 ? itemPrices[0].conversion_ratio : 1,
								cost                : catalogItem.cost * rate,
								amount              : 0,
								discount            : 0,
								rate                : rate,
								locale              : catalogItem.locale,
								movement            : -1,

								item_prices         : itemPrices
							});
						}
					});

					this.changes();
				}else{
					var rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date)),
						itemPrices = banhji.source.getPriceList(data.item_id);

					data.set("item_prices", itemPrices);
					data.set("measurement_id", itemPrices.length>0 ? itemPrices[0].measurement_id : item.measurement_id);
					data.set("description", item.purchase_description);
					data.set("quantity", 1);
					data.set("conversion_ratio", itemPrices.length>0 ? itemPrices[0].conversion_ratio : 1);
					data.set("cost", item.cost * rate);
					data.set("rate", rate);
					data.set("locale", item.locale);

					this.changes();
				}
			}else{
				data.set("item_id", "");
			}
		},
		measurementChanges  : function(e){
			var data = e.data, obj = this.get("obj");

			if(data.measurement_id>0){
				$.each(data.item_prices, function(index, value){
					if(value.measurement_id==data.measurement_id){

						data.set("conversion_ratio", value.conversion_ratio);

						return false;
					}
				});

				this.changes();
			}
		},
		//Number
		checkExistingNumber : function(){
			var self = this, para = [],
			obj = this.get("obj");

			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}

				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();

					if(view.length>0){
						self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber      : function(){
			var self = this, obj = this.get("obj"),
				issueDate = new Date(obj.issued_date),
				startDate = new Date(obj.issued_date),
				endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.numberDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				]
			}).then(function(){
				var view = self.numberDS.view(),
				number = 0, str = "";

				if(view.length>0){
					number = view[0].number.match(/\d+/g).map(Number);
				}

				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

				obj.set("number", str);
			});
		},
		//Obj
		loadObj             : function(id){
			var self = this, para = [];

			para.push({ field:"id", value: id });

			this.dataSource.query({
				filter: para
			}).then(function(e){
				var view = self.dataSource.view();

				self.set("obj", view[0]);
				self.set("total", kendo.toString(view[0].amount, "c", view[0].locale));

				self.loadLines(id);
				self.assemblyLineDS.filter([
					{ field: "transaction_id", value: id },
					{ field: "assembly_id >", value: 0 }
				]);
				self.journalLineDS.filter({ field: "transaction_id", value: id });
				self.attachmentDS.filter({ field: "transaction_id", value: id });
				self.referenceDS.filter([
					{ field: "contact_id", value: view[0].contact_id },
					{ field: "amount >", value: 0 },
					{ field: "type", value:"Vendor_Deposit" }
				]);

				self.returnDS.query({
					filter:{ field: "return_id", value: id }
				}).then(function(){
					var reInvoice = self.returnDS.view();

					$.each(reInvoice, function(index, value){
						value.set("amount", Math.abs(value.amount));
					});
				});

				self.loadDeposit();
			});
		},
		loadLines           : function(id){
			var self = this;

			self.lineDS.query({
				filter: [
					{ field: "transaction_id", value: id },
					{ field: "assembly_id", value: 0 }
				],
			}).then(function(){
				var view = self.lineDS.view();

				$.each(view, function(index, value){
					value.set("item_prices", banhji.source.getPriceList(value.item_id));
				});
			});
		},
		changes             : function(){
			var self = this, obj = this.get("obj"),
			subTotal = 0, tax = 0, returnAmount = 0, itemIds = [];

			$.each(this.lineDS.data(), function(index, value) {
				var amt = value.quantity * value.cost;

				//Tax by line
				if(value.tax_item_id>0){
					var taxItem = self.taxItemDS.get(value.tax_item_id);
					tax += amt * taxItem.rate;
				}

				value.set("amount", amt);
				subTotal += amt;

				if(value.item_id>0){
					itemIds.push(value.item_id);
				}
			});

			//Return
			$.each(this.returnDS.data(), function(index, value) {
				if(value.amount>value.sub_total){
					value.set("amount", value.sub_total);
				}
				returnAmount += value.amount;
			});

			total = subTotal + tax + returnAmount;

			obj.set("sub_total", subTotal);
			obj.set("tax", tax);
			obj.set("deposit", returnAmount);
			obj.set("amount", total);

			this.set("total", kendo.toString(total, "c", obj.locale));

			//Remove Assembly Item List
			var raw = this.assemblyLineDS.data();
			var item, i;
			for(i=raw.length-1; i>=0; i--){
				item = raw[i];

				if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
					this.assemblyLineDS.remove(item);
				}
			}
		},
		addEmpty            : function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.journalLineDS.data([]);
			this.returnDS.data([]);
			this.referenceDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);

			this.dataSource.insert(0, {
				contact_id          : "",
				reference_id        : "",
				recurring_id        : "",
				job_id              : 0,
				user_id             : this.get("user_id"),
				type                : "Payment_Refund", //Require
				number              : "",
				sub_total           : 0,
				discount            : 0,
				tax                 : 0,
				amount              : 0,
				deposit             : 0,
				amount_paid         : 0,
				remaining           : 0,
				rate                : 1,
				locale              : banhji.locale,
				issued_date         : new Date(),
				bill_to             : "",
				ship_to             : "",
				memo                : "",
				memo2               : "",
				status              : 0,
				segments            : [],
				is_journal          : 1,
				//Recurring
				recurring_name      : "",
				start_date          : new Date(),
				frequency           : "Daily",
				month_option        : "Day",
				interval            : 1,
				day                 : 1,
				week                : 0,
				month               : 0,
				is_recurring        : 0,

				contact             : { id:0, name:"" }
			});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);

			this.setRate();
			this.addRow();
			this.generateNumber();
		},
		addRow              : function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id      : obj.id,
				tax_item_id         : "",
				item_id             : "",
				measurement_id      : 0,
				description         : "",
				quantity            : 1,
				conversion_ratio            : 1,
				cost                : 0,
				amount              : 0,
				discount            : 0,
				fine                : 0,
				rate                : obj.rate,
				locale              : obj.locale,
				movement            : -1,
				reference_no        : "",

				item_prices         : []
			});
		},
		removeRow           : function(e){
			var data = e.data;

			//Remove Assembly Item List
			if(data.item_id>0){
				var raw = this.assemblyLineDS.data();

				var item, i;
				for(i=raw.length-1; i>=0; i--){
					item = raw[i];
					if (item.assembly_id==data.item_id){
						this.assemblyLineDS.remove(item);
					}

				}
			}

			this.lineDS.remove(data);
			this.changes();
		},
		objSync             : function(){
			var dfd = $.Deferred();

			this.dataSource.sync();
			this.dataSource.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		},
		save                : function(){
			var self = this, obj = this.get("obj");
			obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

			//Mode
			if(obj.isNew()==false){
				//Journal
				$.each(this.journalLineDS.data(), function(index, value){
					value.set("deleted", 1);
				});

				this.addJournal(obj.id);
			}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Assembly Item line
					$.each(self.assemblyLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Journal
					self.addJournal(data[0].id);
				}

				self.lineDS.sync();
				self.assemblyLineDS.sync();
				self.uploadFile();

				//Return
				var ids = [];
				$.each(self.returnDS.data(), function(index, value){
					if(value.reference_id>0){
						ids.push(value.reference_id);
					}
					value.set("return_id", data[0].id);
					value.set("amount", value.amount*-1);
					value.set("issued_date", kendo.toString(new Date(data[0].issued_date), "s"));
				});
				self.returnDS.sync();
				self.updateTxnStatus(ids);

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveClose")){
					//Save Close
					self.set("saveClose", false);
					self.cancel();
					window.history.back();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.cancel();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		cancel              : function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.returnDS.cancelChanges();
			this.assemblyLineDS.cancelChanges();
			this.attachmentDS.cancelChanges();

			this.dataSource.data([]);
			this.lineDS.data([]);
			this.returnDS.data([]);
			this.assemblyLineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("payment_refund");
		},
		validating          : function(){
			var result = true, obj = this.get("obj"),
			total_deposit = this.get("total_deposit");

			if(obj.deposit>total_deposit){
				$("#ntf1").data("kendoNotification").error("Over deposit amount to refund!");

				result = false;
			}

			if(this.lineDS.total()==0 && this.returnDS.total()==0){
				$("#ntf1").data("kendoNotification").error("Please select an item or deposit.");

				result = false;
			}

			return result;
		},
		updateTxnStatus     : function(ids){
			var self = this;

			if(ids.length>0){
				this.txnDS.query({
					filter:{ field:"id", operator:"where_in", value:ids }
				}).then(function(){
					var view = self.txnDS.view();

					$.each(view, function(index, value){
						value.set("status", 3);//Status 3 = refund
					});

					self.txnDS.sync();
				});
			}
		},
		//Return
		addRowReturn        : function(){
			var obj = this.get("obj"), account_id = 0;

			if(obj.contact_id>0){
				var contact = obj.contact;
				account_id = contact.deposit_account_id;
			}

			this.returnDS.add({
				return_id       : obj.id,
				account_id      : account_id,
				contact_id      : obj.contact_id,
				reference_id    : "",
				reference_no    : "",
				number          : "",
				type            : "Vendor_Deposit",
				amount          : 0,
				rate            : obj.rate,
				locale          : obj.locale,
				issued_date     : obj.issued_date
			});
		},
		removeRowReturn     : function(e){
			var data = e.data;

			this.returnDS.remove(data);
			this.changes();
		},
		loadReference       : function(){
			var obj = this.get("obj");

			if(obj.contact_id>0){
				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "amount >", value: 0 },
					{ field: "status <>", value: 3 },
					{ field: "type", value:"Vendor_Deposit" }
				]);
			}
		},
		referenceChanges    : function(e){
			var data = e.data;

			if(data.reference_id>0){
				var txn = this.referenceDS.get(data.reference_id);

				data.set("account_id", txn.account_id);
				data.set("reference_no", txn.number);
				data.set("sub_total", txn.amount);
				data.set("amount", txn.amount);
			}else{
				data.set("account_id", 0);
				data.set("reference_no", "");
				data.set("sub_total", 0);
				data.set("amount", 0);
			}

			this.changes();
		},
		//Journal
		addJournal          : function(transaction_id){
			var self = this,
				obj = this.get("obj"),
				contact = obj.contact,
				raw = "", entries = {};

			//Cash on Dr
			var cashID = kendo.parseInt(obj.account_id);
			if(cashID>0){
				raw = "dr"+cashID;

				if(entries[raw]===undefined){
					entries[raw] = {
						transaction_id      : transaction_id,
						account_id          : cashID,
						contact_id          : obj.contact_id,
						description         : obj.memo,
						reference_no        : "",
						segments            : obj.segments,
						dr                  : obj.amount,
						cr                  : 0,
						rate                : obj.rate,
						locale              : obj.locale
					};
				}else{
					entries[raw].dr += obj.amount;
				}
			}

			//Item lines
			$.each(this.lineDS.data(), function(index, value){
				var item = self.itemDS.get(value.item_id);

				//Service on Cr
				if(item.item_type_id==4){
					var serviceID = kendo.parseInt(item.expense_account_id);
					if(serviceID>0){
						raw = "cr"+serviceID;

						var serviceAmount = value.amount;
						if(item.item_type_id==1 || item.item_type_id==4){
							serviceAmount = value.quantity * value.conversion_ratio * value.cost;
						}

						if(entries[raw]===undefined){
							entries[raw] = {
								transaction_id      : transaction_id,
								account_id          : serviceID,
								contact_id          : obj.contact_id,
								description         : value.description,
								reference_no        : "",
								segments            : obj.segments,
								dr                  : 0,
								cr                  : serviceAmount,
								rate                : value.rate,
								locale              : item.locale
							};
						}else{
							entries[raw].cr += serviceAmount;
						}
					}
				}

				//Inventory on Cr
				var inventoryID = kendo.parseInt(item.inventory_account_id);
				if(inventoryID>0){
					raw = "cr"+inventoryID;

					var inventoryAmount = value.amount;
					if(item.item_type_id==1 || item.item_type_id==4){
						inventoryAmount = value.quantity * value.conversion_ratio * value.cost;
					}

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : inventoryID,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : 0,
							cr                  : inventoryAmount,
							rate                : value.rate,
							locale              : item.locale
						};
					}else{
						entries[raw].cr += inventoryAmount;
					}
				}

				//Tax on Cr
				if(value.tax_item_id>0){
					var taxItem = self.taxItemDS.get(value.tax_item_id),
						raw = "cr"+taxItem.account_id,
						taxAmt = value.amount * taxItem.rate;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : taxItem.account_id,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : "",
							segments            : obj.segments,
							dr                  : 0,
							cr                  : taxAmt,
							rate                : obj.rate,
							locale              : obj.locale
						};
					}else{
						entries[raw].cr += taxAmt;
					}
				}
			});

			//Return Lines
			$.each(this.returnDS.data(), function(index, value){
				//Deposit on Cr
				var depositID = kendo.parseInt(value.account_id);
				if(depositID>0){
					raw = "cr"+depositID;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id      : transaction_id,
							account_id          : depositID,
							contact_id          : obj.contact_id,
							description         : value.description,
							reference_no        : value.reference_no,
							segments            : value.segments,
							dr                  : 0,
							cr                  : value.amount,
							rate                : value.rate,
							locale              : value.locale
						};
					}else{
						entries[raw].cr += value.amount;
					}
				}
			});

			//Add to journal entry
			if(!jQuery.isEmptyObject(entries)){
				$.each(entries, function(index, value){
					self.journalLineDS.add(value);
				});
			}

			this.journalLineDS.sync();
		}
	});
	banhji.cashPayment =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "transactions"),
		txnDS               : dataStore(apiUrl + "transactions"),
		journalLineDS       : dataStore(apiUrl + "journal_lines"),
		txnTemplateDS       : new kendo.data.DataSource({
			data: banhji.source.txnTemplateList,
			filter:{ field: "type", value: "Cash_Payment" }
		}),
		segmentItemDS       : new kendo.data.DataSource({
			data: banhji.source.segmentItemList,
			sort: [
				{ field: "segment_id", dir: "asc" },
				{ field: "code", dir: "asc" }
			]
		}),
		contactDS           : banhji.source.supplierDS,
		accountDS           : new kendo.data.DataSource({
			data: banhji.source.accountList,
			filter:{ field:"account_type_id", value: 10 },
			sort: { field:"number", dir:"asc" }
		}),
		paymentTermDS       : banhji.source.paymentTermDS,
		paymentMethodDS     : banhji.source.paymentMethodDS,
		amtDueColor         : banhji.source.amtDueColor,
		showCheckNo         : false,
		showReceiptNo       : false,
		obj                 : null,
		isEdit              : false,
		saveClose           : false,
		savePrint           : false,
		searchText          : "",
		contact_id          : "",
		invoice_id          : 0,
		total               : 0,
		total_received      : 0,
		original_total      : 0,
		deleteVisible       : false,
		user_id             : banhji.source.user_id,
		pageLoad            : function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Contact
		loadContact         : function(id){
			this.set("contact_id", id);
			this.search();
		},
		contactChanges      : function(){
			this.search();
		},
		getContactName      : function(id){
			var raw = banhji.source.customerDS.get(id);
			if(raw){
				return raw.name;
			}else{
				return "";
			}
		},
		//Payment Term
		issuedDateChanges   : function(){
			this.applyTerm();
			this.setRate();
		},
		applyTerm           : function(){
			var self = this, obj = this.get("obj"),
			today = new Date();

			$.each(this.dataSource.data(), function(index, value){
				var term = self.paymentTermDS.get(value.payment_term_id),
				termDate = new Date(value.reference[0].issued_date),
				discountPeriod = 0;

				if(term){
					discountPeriod = kendo.parseInt(term.discount_period);
				}

				termDate.setDate(termDate.getDate() + discountPeriod);

				if(today<=termDate){
					if(value.reference[0].amount_paid==0){
						var amount = value.reference[0].amount * term.discount_percentage;
						value.set("discount", amount);
						value.set("amount", value.reference[0].amount - amount);
					}
				}
			});
		},
		//Currency Rate
		setRate             : function(){
			var obj = this.get("obj");

			$.each(this.dataSource.data(), function(index, value){
				var rate = banhji.source.getRate(value.locale, new Date(obj.issued_date));

				value.set("rate", rate);
			});

			this.changes();
		},
		//Search
		search              : function(){
			var self = this,
			para = [],
			obj = this.get("obj"),
			searchText = this.get("searchText"),
			invoice_id = this.get("invoice_id"),
			contact_id = this.get("contact_id");

			if(contact_id>0){
				para.push({ field:"contact_id", value: contact_id });
			}

			if(invoice_id>0){
				para.push({ field:"id", value: invoice_id });
			}

			if(searchText!==""){
				para.push({ field:"number", value: searchText });
			}

			if(para.length>0){
				para.push({ field:"type", value:"Credit_Purchase" });
				para.push({ field:"status", operator:"where_in", value:[0,2] });

				if(this.dataSource.total()>0){
					var idList = [];
					$.each(this.dataSource.data(), function(index, value){
						idList.push(value.reference_id);
					});
					para.push({ field:"id", operator:"where_not_in", value:idList });
				}

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 100
				}).then(function(){
					var view = self.txnDS.view();

					if(view.length>0){
						$.each(view, function(index, value){
							var amount_due = value.amount - (value.amount_paid + value.deposit);

							self.dataSource.add({
								transaction_template_id : 0,
								contact_id          : value.contact_id,
								account_id          : obj.account_id,
								payment_term_id     : value.payment_term_id,
								payment_method_id   : obj.payment_method_id,
								reference_id        : value.id,
								user_id             : self.get("user_id"),
								check_no            : value.check_no,
								reference_no        : value.number,
								type                : "Cash_Payment",
								sub_total           : amount_due,
								amount              : amount_due,
								discount            : 0,
								rate                : value.rate,
								movement 			: -1,
								locale              : value.locale,
								issued_date         : obj.issued_date,
								memo                : obj.memo,
								memo2               : obj.memo2,
								status              : 0,
								segments            : obj.segments,
								is_journal          : 1,
								//Recurring
								recurring_name      : "",
								start_date          : new Date(),
								frequency           : "Daily",
								month_option        : "Day",
								interval            : 1,
								day                 : 1,
								week                : 0,
								month               : 0,
								is_recurring        : 0,

								reference           : [value],
								contact             : value.contact
							});
						});
						self.applyTerm();
						self.setRate();
					}

					self.set("searchText", "");
					self.set("contact_id", "");
					self.set("invoice_id", 0);
				});
			}
		},
		segmentChanges      : function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);

			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		//Obj
		loadObj             : function(id){
			var self = this;

			this.dataSource.query({
				filter: { field:"id", value: id },
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.dataSource.view();

				self.set("obj", view[0]);
				self.set("total", kendo.toString(view[0].amount, "c", view[0].locale));
				self.set("total_received", kendo.toString(view[0].amount, "c", view[0].locale));

				self.journalLineDS.filter({ field: "transaction_id", value: id });
			});
		},
		loadInvoice         : function(id){
			this.set("invoice_id", id);
			this.search();
		},
		dataSourceChanges   : function(arg){
			var self = banhji.cashPayment;

			if(arg.field){
				if(arg.field=="amount" || arg.field=="discount"){
					self.changes();
				}else if(arg.field=="discount_percentage"){
					var dataRow = arg.items[0],
						percentageAmount = dataRow.sub_total * dataRow.discount_percentage;

					dataRow.set("discount", percentageAmount);
				}
			}
		},
		changes             : function(){
			var self = this, obj = this.get("obj"),
			total = 0, sub_total = 0, discount = 0, total_received = 0, remaining = 0;

			$.each(this.dataSource.data(), function(index, value) {
				var amt = kendo.parseFloat(value.sub_total) - kendo.parseFloat(value.discount);
				if(kendo.parseFloat(value.amount)>amt){
					value.set("amount", amt);
				}

				sub_total += kendo.parseFloat(value.sub_total) / value.rate;
				discount += kendo.parseFloat(value.discount) / value.rate;
				total_received += kendo.parseFloat(value.amount) / value.rate;
			});

			total = sub_total - discount;
			remaining = total - total_received;

			obj.set("sub_total", sub_total);
			obj.set("discount", discount);
			this.set("total", kendo.toString(total, "c2", banhji.locale));
			this.set("total_received", kendo.toString(total_received, "c2", banhji.locale));
			obj.set("remaining", remaining);
		},
		removeRow           : function(e){
			var data = e.data;
			this.dataSource.remove(data);
			this.changes();
		},
		addEmpty            : function(){
			this.dataSource.data([]);
			this.txnDS.data([]);
			this.journalLineDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);
			this.set("total_received", 0);

			this.set("obj", {
				transaction_template_id : 12,
				account_id          : 7,
				payment_method_id   : 1,
				rate                : 1,
				sub_total           : 0,
				discount            : 0,
				remaining           : 0,
				locale              : banhji.locale,
				issued_date         : new Date(),
				memo                : "",
				memo2               : "",
				segments            : []
			});
		},
		objSync             : function(){
			var dfd = $.Deferred();

			this.dataSource.sync();
			this.dataSource.bind("requestEnd", function(e){
				if(e.response){
					dfd.resolve(e.response.results);
				}
			});
			this.dataSource.bind("error", function(e){
				dfd.reject(e.errorThrown);
			});

			return dfd;
		},
		save                : function(){
			var self = this, obj = this.get("obj");

			if(this.get("isEdit")){
				obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

				//Delete Previouse Journal
				$.each(this.journalLineDS.data(), function(index, value){
					value.set("deleted", 1);
				});
			}else{
				//Add brand new transaction
				$.each(this.dataSource.data(), function(index, value){
					value.set("transaction_template_id", obj.transaction_template_id);
					value.set("account_id", obj.account_id);
					value.set("payment_method_id", obj.payment_method_id);
					value.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
					value.set("memo", obj.memo);
					value.set("memo2", obj.memo2);
					value.set("segments", obj.segments);
				});
			}

			this.objSync()
			.then(function(data){
				var ids = [];
				//Save journals
				$.each(data, function(index, value){
					var contact = value.contact,
					ref = self.dataSource.at(index);
					ids.push(value.reference_id);

					//AP on Dr
					self.journalLineDS.add({
						transaction_id      : value.id,
						account_id          : ref.reference[0].account_id,
						contact_id          : value.contact_id,
						description         : "",
						reference_no        : "",
						segments            : obj.segments,
						dr                  : kendo.parseFloat(value.amount) + kendo.parseFloat(value.discount),
						cr                  : 0,
						rate                : value.rate,
						locale              : value.locale
					});

					//Cash on Cr
					self.journalLineDS.add({
						transaction_id      : value.id,
						account_id          : obj.account_id,
						contact_id          : value.contact_id,
						description         : "",
						reference_no        : "",
						segments            : obj.segments,
						dr                  : 0,
						cr                  : value.amount,
						rate                : value.rate,
						locale              : value.locale
					});

					if(value.discount>0){
						//Discount on Cr
						self.journalLineDS.add({
							transaction_id      : value.id,
							account_id          : contact.settlement_discount_id,
							contact_id          : value.contact_id,
							description         : "",
							reference_no        : "",
							segments            : obj.segments,
							dr                  : 0,
							cr                  : value.discount,
							rate                : value.rate,
							locale              : value.locale
						});
					}
				});

				self.journalLineDS.sync();
				self.updateTxnStatus(ids);

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveClose")){
					//Save Close
					self.set("saveClose", false);
					self.cancel();
					window.history.back();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.cancel();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		cancel              : function(){
			this.dataSource.cancelChanges();

			banhji.userManagement.removeMultiTask("cash_payment");
		},
		updateTxnStatus     : function(ids){
			var self = this;

			if(ids.length>0){
				this.txnDS.query({
					filter:{ field:"id", operator:"where_in", value:ids }
				}).then(function(){
					var view = self.txnDS.view();

					$.each(view, function(index, value){
						if(value.amount_paid == 0){
							value.set("status", 0);
						}else if(value.amount_paid >= value.amount){
							value.set("status", 1);
						}else{
							value.set("status", 2);
						}
					});

					self.txnDS.sync();
				});
			}
		}
	});

	// Report
	banhji.expensesSummarySupplier =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "vendorReports/expense_summary_by_supplier"),
		contactDS           : banhji.source.supplierDS,
		sortList            : banhji.source.sortList,
		sorter              : "month",
		sdate               : "",
		edate               : "",
		obj                 : { contactIds: [] },
		company             : banhji.institute,
		displayDate         : "",
		totalAmount         : 0,
		exArray             : [],
		pageLoad            : function(){
			this.search();
		},
		sorterChanges       : function(){
			var today = new Date(),
			sdate = "",
			edate = "",
			sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

					break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

					break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

					break;
				case "year":
					this.set("sdate", new Date(today.getFullYear(), 0, 1));
					this.set("edate", new Date(today.getFullYear(), 11, 31));

					break;
				default:
					this.set("sdate", "");
					this.set("edate", "");
			}
		},
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
				end = this.get("edate"),
				displayDate = "";

			//Customer
			if(obj.contactIds.length>0){
				var contactIds = [];
				$.each(obj.contactIds, function(index, value){
					contactIds.push(value);
				});
				para.push({ field:"contact_id", operator:"where_in", value:contactIds });
			}

			//Dates
			if(start && end){
				start = new Date(start);
				end = new Date(end);
				displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
				end.setDate(end.getDate()+1);

				para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
				para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
			}else if(start){
				start = new Date(start);
				displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

				para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
			}else if(end){
				end = new Date(end);
				displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
				end.setDate(end.getDate()+1);

				para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
			}else{

			}
			this.set("displayDate", displayDate);

			this.dataSource.query({
				filter:para
			}).then(function(){
				var view = self.dataSource.view();

				var amount = 0;
				$.each(view, function(index, value){
					amount += value.amount;
				});

				self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
			});
		},
		printGrid           : function() {
			var gridElement = $('#grid'),
				printableContent = '',
				win = window.open('', '', 'width=990, height=900'),
				doc = win.document.open();
			var htmlStart =
					'<!DOCTYPE html>' +
					'<html>' +
					'<head>' +
					'<meta charset="utf-8" />' +
					'<title></title>' +
					'<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
					'<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
					'<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
					'<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
					'<style>' +
					'html { font: 11pt sans-serif; }' +
					'.k-grid { border-top-width: 0; }' +
					'.k-grid, .k-grid-content { height: auto !important; }' +
					'.k-grid-content { overflow: visible !important; }' +
					'div.k-grid table { table-layout: auto; width: 100% !important; }' +
					'.k-grid .k-grid-header th { border-top: 1px solid; }' +
					'.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
					'</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
						'.inv1 .main-color {' +

							'-webkit-print-color-adjust:exact; ' +
						'} ' +
						'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
						'-webkit-print-color-adjust:exact; color:#fff!important;}' +
						'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
						'.inv1 .light-blue-td { ' +
							'background-color: #c6d9f1!important;' +
							'text-align: left;' +
							'padding-left: 5px;' +
							'-webkit-print-color-adjust:exact; ' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
							'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
							' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
						'.journal_block1>.span2:first-child { ' +
							'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
							'background-color: #1C2633!important;' +
							'color: #fff!important; ' +
							'-webkit-print-color-adjust:exact;' +
						'}' +
						'</style>' +
					'</head>' +
					'<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
			var htmlEnd =
					'</div></body>' +
					'</html>';

			printableContent = $('#invFormContent').html();
			doc.write(htmlStart + printableContent + htmlEnd);
			doc.close();
			setTimeout(function(){
				win.print();
				win.close();
			},2000);
		},
		ExportExcel         : function(){
			var workbook = new kendo.ooxml.Workbook({
			  sheets: [
				{
				  columns: [
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true }
				  ],
				  title: "General Ledger",
				  rows: this.exArray
				}
			  ]
			});
			//save the file as Excel file with extension xlsx
			kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});
	banhji.expensesDetailSupplier =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "vendorReports/expense_detail_by_supplier"),
		contactDS           : banhji.source.supplierDS,
		sortList            : banhji.source.sortList,
		sorter              : "month",
		sdate               : "",
		edate               : "",
		obj                 : { contactIds: [] },
		company             : banhji.institute,
		displayDate         : "",
		totalAmount         : 0,
		exArray             : [],
		pageLoad            : function(){
			this.search();
		},
		sorterChanges       : function(){
			var today = new Date(),
			sdate = "",
			edate = "",
			sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

					break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

					break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

					break;
				case "year":
					this.set("sdate", new Date(today.getFullYear(), 0, 1));
					this.set("edate", new Date(today.getFullYear(), 11, 31));

					break;
				default:
					this.set("sdate", "");
					this.set("edate", "");
			}
		},
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
				end = this.get("edate"),
				displayDate = "";

			//Customer
			if(obj.contactIds.length>0){
				var contactIds = [];
				$.each(obj.contactIds, function(index, value){
					contactIds.push(value);
				});
				para.push({ field:"contact_id", operator:"where_in", value:contactIds });
			}

			//Dates
			if(start && end){
				start = new Date(start);
				end = new Date(end);
				displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
				end.setDate(end.getDate()+1);

				para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
				para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
			}else if(start){
				start = new Date(start);
				displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

				para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
			}else if(end){
				end = new Date(end);
				displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
				end.setDate(end.getDate()+1);

				para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
			}else{

			}
			this.set("displayDate", displayDate);

			this.dataSource.query({
				filter:para
			}).then(function(){
				var view = self.dataSource.view();

				var amount = 0;
				$.each(view, function(index, value){
					amount += value.amount;
				});

				self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
			});
		},
		printGrid           : function() {
			var gridElement = $('#grid'),
				printableContent = '',
				win = window.open('', '', 'width=990, height=900'),
				doc = win.document.open();
			var htmlStart =
					'<!DOCTYPE html>' +
					'<html>' +
					'<head>' +
					'<meta charset="utf-8" />' +
					'<title></title>' +
					'<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
					'<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
					'<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
					'<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
					'<style>' +
					'html { font: 11pt sans-serif; }' +
					'.k-grid { border-top-width: 0; }' +
					'.k-grid, .k-grid-content { height: auto !important; }' +
					'.k-grid-content { overflow: visible !important; }' +
					'div.k-grid table { table-layout: auto; width: 100% !important; }' +
					'.k-grid .k-grid-header th { border-top: 1px solid; }' +
					'.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
					'</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
						'.inv1 .main-color {' +

							'-webkit-print-color-adjust:exact; ' +
						'} ' +
						'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
						'-webkit-print-color-adjust:exact; color:#fff!important;}' +
						'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
						'.inv1 .light-blue-td { ' +
							'background-color: #c6d9f1!important;' +
							'text-align: left;' +
							'padding-left: 5px;' +
							'-webkit-print-color-adjust:exact; ' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
							'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
							' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
						'.journal_block1>.span2:first-child { ' +
							'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
							'background-color: #1C2633!important;' +
							'color: #fff!important; ' +
							'-webkit-print-color-adjust:exact;' +
						'}' +
						'</style>' +
					'</head>' +
					'<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
			var htmlEnd =
					'</div></body>' +
					'</html>';

			printableContent = $('#invFormContent').html();
			doc.write(htmlStart + printableContent + htmlEnd);
			doc.close();
			setTimeout(function(){
				win.print();
				win.close();
			},2000);
		},
		ExportExcel         : function(){
			var workbook = new kendo.ooxml.Workbook({
			  sheets: [
				{
				  columns: [
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true }
				  ],
				  title: "General Ledger",
				  rows: this.exArray
				}
			  ]
			});
			//save the file as Excel file with extension xlsx
			kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});
	banhji.purchaseSummaryProductServices =  kendo.observable({
		lang                : langVM,
		dataSource      : dataStore(apiUrl + "vendorReports/purchase_summary_by_product"),
		itemDS              : new kendo.data.DataSource({
			transport: {
				read    : {
					url: apiUrl + "items",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema  : {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			filter:[
				{ field: "is_catalog <>", value: 1 },
				{ field: "is_assembly <>", value: 1 },
				{ field: "item_type_id", operator:"where_in", value: [1,4] }
			],
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		sortList            : banhji.source.sortList,
		sorter              : "month",
		sdate               : "",
		edate               : "",
		obj                 : { itemIds: [] },
		company             : banhji.institute,
		displayDate         : "",
		avg_sale            : 0,
		total_sale          : 0,
		exArray             : [],
		pageLoad            : function(){
			this.search();
		},
		sorterChanges       : function(){
			var today = new Date(),
			sdate = "",
			edate = "",
			sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

					break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

					break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

					break;
				case "year":
					this.set("sdate", new Date(today.getFullYear(), 0, 1));
					this.set("edate", new Date(today.getFullYear(), 11, 31));

					break;
				default:
					this.set("sdate", "");
					this.set("edate", "");
			}
		},
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
				end = this.get("edate"),
				displayDate = "";

			//Customer
			if(obj.itemIds.length>0){
				var itemIds = [];
				$.each(obj.itemIds, function(index, value){
					itemIds.push(value);
				});
				para.push({ field:"item_id", operator:"where_in", value:itemIds });
			}

			//Dates
			if(start && end){
				start = new Date(start);
				end = new Date(end);
				displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
				end.setDate(end.getDate()+1);

				para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
				para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
			}else if(start){
				start = new Date(start);
				displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

				para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
			}else if(end){
				end = new Date(end);
				displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
				end.setDate(end.getDate()+1);

				para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
			}else{

			}
			this.set("displayDate", displayDate);

			this.dataSource.query({
				filter:para
			}).then(function(){
				var view = self.dataSource.view();

				var txnCount = 0, amount = 0;
				$.each(view, function(index, value){
					txnCount += value.txn_count;
					amount += value.amount;
				});

				self.set("avg_sale", kendo.toString(amount/txnCount, "c2", banhji.locale));
				self.set("total_sale", kendo.toString(amount, "c2", banhji.locale));
			});
		},
		printGrid           : function() {
			var gridElement = $('#grid'),
				printableContent = '',
				win = window.open('', '', 'width=990, height=900'),
				doc = win.document.open();
			var htmlStart =
					'<!DOCTYPE html>' +
					'<html>' +
					'<head>' +
					'<meta charset="utf-8" />' +
					'<title></title>' +
					'<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
					'<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
					'<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
					'<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
					'<style>' +
					'html { font: 11pt sans-serif; }' +
					'.k-grid { border-top-width: 0; }' +
					'.k-grid, .k-grid-content { height: auto !important; }' +
					'.k-grid-content { overflow: visible !important; }' +
					'div.k-grid table { table-layout: auto; width: 100% !important; }' +
					'.k-grid .k-grid-header th { border-top: 1px solid; }' +
					'.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
					'</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
						'.inv1 .main-color {' +

							'-webkit-print-color-adjust:exact; ' +
						'} ' +
						'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
						'-webkit-print-color-adjust:exact; color:#fff!important;}' +
						'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
						'.inv1 .light-blue-td { ' +
							'background-color: #c6d9f1!important;' +
							'text-align: left;' +
							'padding-left: 5px;' +
							'-webkit-print-color-adjust:exact; ' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
							'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
							' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
						'.journal_block1>.span2:first-child { ' +
							'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
							'background-color: #1C2633!important;' +
							'color: #fff!important; ' +
							'-webkit-print-color-adjust:exact;' +
						'}' +
						'</style>' +
					'</head>' +
					'<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
			var htmlEnd =
					'</div></body>' +
					'</html>';

			printableContent = $('#invFormContent').html();
			doc.write(htmlStart + printableContent + htmlEnd);
			doc.close();
			setTimeout(function(){
				win.print();
				win.close();
			},2000);
		},
		ExportExcel         : function(){
			var workbook = new kendo.ooxml.Workbook({
			  sheets: [
				{
				  columns: [
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true }
				  ],
				  title: "General Ledger",
				  rows: this.exArray
				}
			  ]
			});
			//save the file as Excel file with extension xlsx
			kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});
	banhji.purchaseDetailProductServices =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "vendorReports/purchase_detail_by_product"),
		itemDS              : new kendo.data.DataSource({
			transport: {
				read    : {
					url: apiUrl + "items",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.pageSize,
							filter: options.filter,
							sort: options.sort
						};
					} else {
						return {models: kendo.stringify(options.models)};
					}
				}
			},
			schema  : {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			filter:[
				{ field: "is_catalog <>", value: 1 },
				{ field: "is_assembly <>", value: 1 },
				{ field: "item_type_id", operator:"where_in", value: [1,4] }
			],
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		sortList            : banhji.source.sortList,
		sorter              : "month",
		sdate               : "",
		edate               : "",
		obj                 : { itemIds: [] },
		company             : banhji.institute,
		displayDate         : "",
		product_sale        : 0,
		total_sale          : 0,
		exArray             : [],
		pageLoad            : function(){
			this.search();
		},
		sorterChanges       : function(){
			var today = new Date(),
			sdate = "",
			edate = "",
			sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

					break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

					break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

					break;
				case "year":
					this.set("sdate", new Date(today.getFullYear(), 0, 1));
					this.set("edate", new Date(today.getFullYear(), 11, 31));

					break;
				default:
					this.set("sdate", "");
					this.set("edate", "");
			}
		},
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
				end = this.get("edate"),
				displayDate = "";

			//Customer
			if(obj.itemIds.length>0){
				var itemIds = [];
				$.each(obj.itemIds, function(index, value){
					itemIds.push(value);
				});
				para.push({ field:"item_id", operator:"where_in", value:itemIds });
			}

			//Dates
			if(start && end){
				start = new Date(start);
				end = new Date(end);
				displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
				end.setDate(end.getDate()+1);

				para.push({ field:"issued_date >=", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
				para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
			}else if(start){
				start = new Date(start);
				displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

				para.push({ field:"issued_date", operator:"where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
			}else if(end){
				end = new Date(end);
				displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
				end.setDate(end.getDate()+1);

				para.push({ field:"issued_date <", operator:"where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
			}else{

			}
			this.set("displayDate", displayDate);

			this.dataSource.query({
				filter:para
			}).then(function(){
				var view = self.dataSource.view();

				var txnCount = 0, amount = 0, sale = 0;
				$.each(view, function(index, value){
					$.each(value.line, function(ind, val){
						txnCount++;
						amount += val.amount;
						sale += val.total;
					});
				});

				self.set("product_sale", kendo.toString(amount/txnCount, "c2", banhji.locale));
				self.set("total_sale", kendo.toString(sale, "c2", banhji.locale));
			});
		},
		printGrid           : function() {
			var gridElement = $('#grid'),
				printableContent = '',
				win = window.open('', '', 'width=990, height=900'),
				doc = win.document.open();
			var htmlStart =
					'<!DOCTYPE html>' +
					'<html>' +
					'<head>' +
					'<meta charset="utf-8" />' +
					'<title></title>' +
					'<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
					'<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
					'<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
					'<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
					'<style>' +
					'html { font: 11pt sans-serif; }' +
					'.k-grid { border-top-width: 0; }' +
					'.k-grid, .k-grid-content { height: auto !important; }' +
					'.k-grid-content { overflow: visible !important; }' +
					'div.k-grid table { table-layout: auto; width: 100% !important; }' +
					'.k-grid .k-grid-header th { border-top: 1px solid; }' +
					'.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
					'</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
						'.inv1 .main-color {' +

							'-webkit-print-color-adjust:exact; ' +
						'} ' +
						'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
						'-webkit-print-color-adjust:exact; color:#fff!important;}' +
						'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
						'.inv1 .light-blue-td { ' +
							'background-color: #c6d9f1!important;' +
							'text-align: left;' +
							'padding-left: 5px;' +
							'-webkit-print-color-adjust:exact; ' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
							'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
							' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
						'.journal_block1>.span2:first-child { ' +
							'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
							'background-color: #1C2633!important;' +
							'color: #fff!important; ' +
							'-webkit-print-color-adjust:exact;' +
						'}' +
						'</style>' +
					'</head>' +
					'<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
			var htmlEnd =
					'</div></body>' +
					'</html>';

			printableContent = $('#invFormContent').html();
			doc.write(htmlStart + printableContent + htmlEnd);
			doc.close();
			setTimeout(function(){
				win.print();
				win.close();
			},2000);
		},
		ExportExcel         : function(){
			var workbook = new kendo.ooxml.Workbook({
			  sheets: [
				{
				  columns: [
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true }
				  ],
				  title: "General Ledger",
				  rows: this.exArray
				}
			  ]
			});
			//save the file as Excel file with extension xlsx
			kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});
	banhji.suppliersBalanceSummary =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "vendorReports/balance_summary"),
		obj                 : null,
		company             : banhji.institute,
		as_of               : new Date(),
		displayDate         : "",
		totalTxn            : 0,
		totalBalance        : 0,
		exArray             : [],
		pageLoad            : function(){
			this.search();
		},
		search              : function(){
			var self = this, para = [],
				as_of = this.get("as_of"),
				displayDate = "";

			if(as_of){
				as_of = new Date(as_of);
				var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
				this.set("displayDate", displayDate);
				as_of.setDate(as_of.getDate()+1);

				para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
			}

			this.dataSource.query({
				filter:para
			}).then(function(){
				var view = self.dataSource.view();

				var balance = 0, txnCount = 0;
				$.each(view, function(index, value){
					txnCount += value.txn_count;
					balance += value.amount;
				});

				self.set("total_txn", kendo.toString(txnCount, "n0"));
				self.set("total_balance", kendo.toString(balance, "c2", banhji.locale));
			});
		},
		printGrid           : function() {
			var gridElement = $('#grid'),
				printableContent = '',
				win = window.open('', '', 'width=990, height=900'),
				doc = win.document.open();
			var htmlStart =
					'<!DOCTYPE html>' +
					'<html>' +
					'<head>' +
					'<meta charset="utf-8" />' +
					'<title></title>' +
					'<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
					'<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
					'<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
					'<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
					'<style>' +
					'html { font: 11pt sans-serif; }' +
					'.k-grid { border-top-width: 0; }' +
					'.k-grid, .k-grid-content { height: auto !important; }' +
					'.k-grid-content { overflow: visible !important; }' +
					'div.k-grid table { table-layout: auto; width: 100% !important; }' +
					'.k-grid .k-grid-header th { border-top: 1px solid; }' +
					'.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
					'</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
						'.inv1 .main-color {' +

							'-webkit-print-color-adjust:exact; ' +
						'} ' +
						'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
						'-webkit-print-color-adjust:exact; color:#fff!important;}' +
						'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
						'.inv1 .light-blue-td { ' +
							'background-color: #c6d9f1!important;' +
							'text-align: left;' +
							'padding-left: 5px;' +
							'-webkit-print-color-adjust:exact; ' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
							'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
							' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
						'.journal_block1>.span2:first-child { ' +
							'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
							'background-color: #1C2633!important;' +
							'color: #fff!important; ' +
							'-webkit-print-color-adjust:exact;' +
						'}' +
						'</style>' +
					'</head>' +
					'<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
			var htmlEnd =
					'</div></body>' +
					'</html>';

			printableContent = $('#invFormContent').html();
			doc.write(htmlStart + printableContent + htmlEnd);
			doc.close();
			setTimeout(function(){
				win.print();
				win.close();
			},2000);
		},
		ExportExcel         : function(){
			var workbook = new kendo.ooxml.Workbook({
			  sheets: [
				{
				  columns: [
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true }
				  ],
				  title: "General Ledger",
				  rows: this.exArray
				}
			  ]
			});
			//save the file as Excel file with extension xlsx
			kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});
	banhji.suppliersBalanceDetail =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "vendorReports/balance_detail"),
		obj                 : null,
		company             : banhji.institute,
		as_of               : new Date(),
		displayDate         : "",
		totalTxn            : 0,
		totalBalance        : 0,
		exArray             : [],
		contactDS           : banhji.source.supplierDS,
		obj                 : { contactIds: [] },
		pageLoad            : function(){
			this.search();
		},
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				as_of = this.get("as_of"),
				displayDate = "";

			//Customer
			if(obj.contactIds.length>0){
				var contactIds = [];
				$.each(obj.contactIds, function(index, value){
					contactIds.push(value);
				});
				para.push({ field:"contact_id", operator:"where_in", value:contactIds });
			}

			if(as_of){
				as_of = new Date(as_of);
				var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
				this.set("displayDate", displayDate);
				as_of.setDate(as_of.getDate()+1);

				para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
			}

			this.dataSource.query({
				filter:para,
				sort:[
					{ field:"issued_date", dir:"asc" },
					{ field:"number", operator:"order_by_related_contact", dir:"asc" }
				]
			}).then(function(){
				var view = self.dataSource.view();

				var balance = 0, txnCount = 0;
				$.each(view, function(index, value){
					txnCount += value.line.length;
					$.each(value.line, function(ind, val){
						balance += val.amount;
					});
				});

				self.set("total_txn", kendo.toString(txnCount, "n0"));
				self.set("total_balance", kendo.toString(balance, "c2", banhji.locale));
			});
		},
		printGrid           : function() {
			var gridElement = $('#grid'),
				printableContent = '',
				win = window.open('', '', 'width=990, height=900'),
				doc = win.document.open();
			var htmlStart =
					'<!DOCTYPE html>' +
					'<html>' +
					'<head>' +
					'<meta charset="utf-8" />' +
					'<title></title>' +
					'<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
					'<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
					'<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
					'<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
					'<style>' +
					'html { font: 11pt sans-serif; }' +
					'.k-grid { border-top-width: 0; }' +
					'.k-grid, .k-grid-content { height: auto !important; }' +
					'.k-grid-content { overflow: visible !important; }' +
					'div.k-grid table { table-layout: auto; width: 100% !important; }' +
					'.k-grid .k-grid-header th { border-top: 1px solid; }' +
					'.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
					'</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
						'.inv1 .main-color {' +

							'-webkit-print-color-adjust:exact; ' +
						'} ' +
						'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
						'-webkit-print-color-adjust:exact; color:#fff!important;}' +
						'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
						'.inv1 .light-blue-td { ' +
							'background-color: #c6d9f1!important;' +
							'text-align: left;' +
							'padding-left: 5px;' +
							'-webkit-print-color-adjust:exact; ' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
							'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
							' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
						'.journal_block1>.span2:first-child { ' +
							'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
							'background-color: #1C2633!important;' +
							'color: #fff!important; ' +
							'-webkit-print-color-adjust:exact;' +
						'}' +
						'</style>' +
					'</head>' +
					'<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
			var htmlEnd =
					'</div></body>' +
					'</html>';

			printableContent = $('#invFormContent').html();
			doc.write(htmlStart + printableContent + htmlEnd);
			doc.close();
			setTimeout(function(){
				win.print();
				win.close();
			},2000);
		},
		ExportExcel         : function(){
			var workbook = new kendo.ooxml.Workbook({
			  sheets: [
				{
				  columns: [
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true }
				  ],
				  title: "General Ledger",
				  rows: this.exArray
				}
			  ]
			});
			//save the file as Excel file with extension xlsx
			kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});
	banhji.payablesAgingSummary =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "vendorReports/aging_summary"),
		contactDS           : banhji.source.supplierDS,
		obj                 : { contactIds: [] },
		company             : banhji.institute,
		as_of               : new Date(),
		displayDate         : "",
		totalAmount         : 0,
		exArray             : [],
		pageLoad            : function(){
			this.search();
		},
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				as_of = this.get("as_of"),
				displayDate = "";

			//Customer
			if(obj.contactIds.length>0){
				var contactIds = [];
				$.each(obj.contactIds, function(index, value){
					contactIds.push(value);
				});
				para.push({ field:"contact_id", operator:"where_in", value:contactIds });
			}

			if(as_of){
				as_of = new Date(as_of);
				var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
				this.set("displayDate", displayDate);
				as_of.setDate(as_of.getDate()+1);

				para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
			}

			this.dataSource.query({
				filter:para
			}).then(function(){
				var view = self.dataSource.view();

				var balance = 0;
				$.each(view, function(index, value){
					balance += value.total;
				});

				self.set("totalBalance", kendo.toString(balance, "c2", banhji.locale));
			});
		},
		printGrid           : function() {
			var gridElement = $('#grid'),
				printableContent = '',
				win = window.open('', '', 'width=990, height=900'),
				doc = win.document.open();
			var htmlStart =
					'<!DOCTYPE html>' +
					'<html>' +
					'<head>' +
					'<meta charset="utf-8" />' +
					'<title></title>' +
					'<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
					'<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
					'<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
					'<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
					'<style>' +
					'html { font: 11pt sans-serif; }' +
					'.k-grid { border-top-width: 0; }' +
					'.k-grid, .k-grid-content { height: auto !important; }' +
					'.k-grid-content { overflow: visible !important; }' +
					'div.k-grid table { table-layout: auto; width: 100% !important; }' +
					'.k-grid .k-grid-header th { border-top: 1px solid; }' +
					'.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
					'</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
						'.inv1 .main-color {' +

							'-webkit-print-color-adjust:exact; ' +
						'} ' +
						'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
						'-webkit-print-color-adjust:exact; color:#fff!important;}' +
						'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
						'.inv1 .light-blue-td { ' +
							'background-color: #c6d9f1!important;' +
							'text-align: left;' +
							'padding-left: 5px;' +
							'-webkit-print-color-adjust:exact; ' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
							'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
							' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
						'.journal_block1>.span2:first-child { ' +
							'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
							'background-color: #1C2633!important;' +
							'color: #fff!important; ' +
							'-webkit-print-color-adjust:exact;' +
						'}' +
						'</style>' +
					'</head>' +
					'<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
			var htmlEnd =
					'</div></body>' +
					'</html>';

			printableContent = $('#invFormContent').html();
			doc.write(htmlStart + printableContent + htmlEnd);
			doc.close();
			setTimeout(function(){
				win.print();
				win.close();
			},2000);
		},
		ExportExcel         : function(){
			var workbook = new kendo.ooxml.Workbook({
			  sheets: [
				{
				  columns: [
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true }
				  ],
				  title: "General Ledger",
				  rows: this.exArray
				}
			  ]
			});
			//save the file as Excel file with extension xlsx
			kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});
	banhji.payablesAgingDetail =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "vendorReports/aging_detail"),
		contactDS           : banhji.source.supplierDS,
		obj                 : { contactIds: [] },
		company             : banhji.institute,
		as_of               : new Date(),
		displayDate         : "",
		totalBalance        : 0,
		exArray             : [],
		pageLoad            : function(){
			this.search();
		},
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				as_of = this.get("as_of"),
				displayDate = "";

			//Customer
			if(obj.contactIds.length>0){
				var contactIds = [];
				$.each(obj.contactIds, function(index, value){
					contactIds.push(value);
				});
				para.push({ field:"contact_id", operator:"where_in", value:contactIds });
			}

			if(as_of){
				as_of = new Date(as_of);
				var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
				this.set("displayDate", displayDate);
				as_of.setDate(as_of.getDate()+1);

				para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
			}

			this.dataSource.query({
				filter:para,
				sort:[
					{ field:"issued_date", dir:"asc" },
					{ field:"number", operator:"order_by_related_contact", dir:"asc" }
				]
			}).then(function(){
				var view = self.dataSource.view();

				var balance = 0;
				$.each(view, function(index, value){
					$.each(value.line, function(ind, val){
						balance += val.amount;
					});
				});

				self.set("totalBalance", kendo.toString(balance, "c2", banhji.locale));
			});
		},
		printGrid           : function() {
			var gridElement = $('#grid'),
				printableContent = '',
				win = window.open('', '', 'width=990, height=900'),
				doc = win.document.open();
			var htmlStart =
					'<!DOCTYPE html>' +
					'<html>' +
					'<head>' +
					'<meta charset="utf-8" />' +
					'<title></title>' +
					'<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
					'<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
					'<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
					'<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
					'<style>' +
					'html { font: 11pt sans-serif; }' +
					'.k-grid { border-top-width: 0; }' +
					'.k-grid, .k-grid-content { height: auto !important; }' +
					'.k-grid-content { overflow: visible !important; }' +
					'div.k-grid table { table-layout: auto; width: 100% !important; }' +
					'.k-grid .k-grid-header th { border-top: 1px solid; }' +
					'.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
					'</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
						'.inv1 .main-color {' +

							'-webkit-print-color-adjust:exact; ' +
						'} ' +
						'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
						'-webkit-print-color-adjust:exact; color:#fff!important;}' +
						'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
						'.inv1 .light-blue-td { ' +
							'background-color: #c6d9f1!important;' +
							'text-align: left;' +
							'padding-left: 5px;' +
							'-webkit-print-color-adjust:exact; ' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
							'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
							' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
						'.journal_block1>.span2:first-child { ' +
							'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
							'background-color: #1C2633!important;' +
							'color: #fff!important; ' +
							'-webkit-print-color-adjust:exact;' +
						'}' +
						'</style>' +
					'</head>' +
					'<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
			var htmlEnd =
					'</div></body>' +
					'</html>';

			printableContent = $('#invFormContent').html();
			doc.write(htmlStart + printableContent + htmlEnd);
			doc.close();
			setTimeout(function(){
				win.print();
				win.close();
			},2000);
		},
		ExportExcel         : function(){
			var workbook = new kendo.ooxml.Workbook({
			  sheets: [
				{
				  columns: [
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true }
				  ],
				  title: "General Ledger",
				  rows: this.exArray
				}
			  ]
			});
			//save the file as Excel file with extension xlsx
			kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});
	banhji.listBillsPaid =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "vendorReports/bill_topay"),
		contactDS           : banhji.source.supplierDS,
		obj                 : { contactIds: [] },
		company             : banhji.institute,
		as_of               : new Date(),
		displayDate         : "",
		totalAmount         : 0,
		exArray             : [],
		pageLoad            : function(){
			this.search();
		},
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				as_of = this.get("as_of"),
				displayDate = "";

			//Customer
			if(obj.contactIds.length>0){
				var contactIds = [];
				$.each(obj.contactIds, function(index, value){
					contactIds.push(value);
				});
				para.push({ field:"contact_id", operator:"where_in", value:contactIds });
			}

			if(as_of){
				as_of = new Date(as_of);
				var displayDate = "As Of " + kendo.toString(as_of, "dd-MM-yyyy");
				this.set("displayDate", displayDate);
				as_of.setDate(as_of.getDate()+1);

				para.push({ field:"issued_date <", value:kendo.toString(as_of, "yyyy-MM-dd") });
			}

			this.dataSource.query({
				filter:para
			}).then(function(){
				var view = self.dataSource.view();

				var amount = 0;
				$.each(view, function(index, value){
					amount += value.amount;
				});

				self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
			});
		},
		printGrid           : function() {
			var gridElement = $('#grid'),
				printableContent = '',
				win = window.open('', '', 'width=990, height=900'),
				doc = win.document.open();
			var htmlStart =
					'<!DOCTYPE html>' +
					'<html>' +
					'<head>' +
					'<meta charset="utf-8" />' +
					'<title></title>' +
					'<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
					'<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
					'<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
					'<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
					'<style>' +
					'html { font: 11pt sans-serif; }' +
					'.k-grid { border-top-width: 0; }' +
					'.k-grid, .k-grid-content { height: auto !important; }' +
					'.k-grid-content { overflow: visible !important; }' +
					'div.k-grid table { table-layout: auto; width: 100% !important; }' +
					'.k-grid .k-grid-header th { border-top: 1px solid; }' +
					'.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
					'</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
						'.inv1 .main-color {' +

							'-webkit-print-color-adjust:exact; ' +
						'} ' +
						'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
						'-webkit-print-color-adjust:exact; color:#fff!important;}' +
						'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
						'.inv1 .light-blue-td { ' +
							'background-color: #c6d9f1!important;' +
							'text-align: left;' +
							'padding-left: 5px;' +
							'-webkit-print-color-adjust:exact; ' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
							'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
							' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
						'.journal_block1>.span2:first-child { ' +
							'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
							'background-color: #1C2633!important;' +
							'color: #fff!important; ' +
							'-webkit-print-color-adjust:exact;' +
						'}' +
						'</style>' +
					'</head>' +
					'<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
			var htmlEnd =
					'</div></body>' +
					'</html>';

			printableContent = $('#invFormContent').html();
			doc.write(htmlStart + printableContent + htmlEnd);
			doc.close();
			setTimeout(function(){
				win.print();
				win.close();
			},2000);
		},
		ExportExcel         : function(){
			var workbook = new kendo.ooxml.Workbook({
			  sheets: [
				{
				  columns: [
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true }
				  ],
				  title: "General Ledger",
				  rows: this.exArray
				}
			  ]
			});
			//save the file as Excel file with extension xlsx
			kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});
	banhji.billPaymentList =  kendo.observable({
		lang                : langVM,
		dataSource          : dataStore(apiUrl + "vendorReports/bill_list"),
		contactDS           : banhji.source.supplierDS,
		sortList            : banhji.source.sortList,
		sorter              : "month",
		sdate               : "",
		edate               : "",
		obj                 : { contactIds: [] },
		company             : banhji.institute,
		displayDate         : "",
		total_txn           : 0,
		totalAmount         : 0,
		exArray             : [],
		pageLoad            : function(){
			this.search();
		},
		sorterChanges       : function(){
			var today = new Date(),
			sdate = "",
			edate = "",
			sorter = this.get("sorter");

			switch(sorter){
				case "today":
					this.set("sdate", today);
					this.set("edate", "");

					break;
				case "week":
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));

					break;
				case "month":
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

					break;
				case "year":
					this.set("sdate", new Date(today.getFullYear(), 0, 1));
					this.set("edate", new Date(today.getFullYear(), 11, 31));

					break;
				default:
					this.set("sdate", "");
					this.set("edate", "");
			}
		},
		search              : function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
				end = this.get("edate"),
				displayDate = "";

			//Customer
			if(obj.contactIds.length>0){
				var contactIds = [];
				$.each(obj.contactIds, function(index, value){
					contactIds.push(value);
				});
				para.push({ field:"contact_id", operator:"where_in", value:contactIds });
			}

			//Dates
			if(start && end){
				start = new Date(start);
				end = new Date(end);
				displayDate = "From " + kendo.toString(start, "dd-MM-yyyy") + " To " + kendo.toString(end, "dd-MM-yyyy");
				end.setDate(end.getDate()+1);

				para.push({ field:"issued_date >=", value: kendo.toString(start, "yyyy-MM-dd") });
				para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
			}else if(start){
				start = new Date(start);
				displayDate = "On " + kendo.toString(start, "dd-MM-yyyy");

				para.push({ field:"issued_date", value: kendo.toString(start, "yyyy-MM-dd") });
			}else if(end){
				end = new Date(end);
				displayDate = "As Of " + kendo.toString(end, "dd-MM-yyyy");
				end.setDate(end.getDate()+1);

				para.push({ field:"issued_date <", value: kendo.toString(end, "yyyy-MM-dd") });
			}else{

			}
			this.set("displayDate", displayDate);

			this.dataSource.query({
				filter:para
			}).then(function(){
				var view = self.dataSource.view();

				var amount = 0, txn = [];
				$.each(view, function(index, value){
					$.each(value.line, function(indexx, x){
						var txnId = kendo.parseInt(x.reference.id);
						if(txnId>0){
							txn.push(txnId);
						}

						amount += x.amount;
					});
				});

				txn = jQuery.unique(txn);

				self.set("total_txn", kendo.toString(txn.length, "n0"));
				self.set("totalAmount", kendo.toString(amount, "c2", banhji.locale));
			});
		},
		printGrid           : function() {
			var gridElement = $('#grid'),
				printableContent = '',
				win = window.open('', '', 'width=990, height=900'),
				doc = win.document.open();
			var htmlStart =
					'<!DOCTYPE html>' +
					'<html>' +
					'<head>' +
					'<meta charset="utf-8" />' +
					'<title></title>' +
					'<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
					'<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsive.css">' +
					'<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
					'<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
					'<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
					'<style>' +
					'html { font: 11pt sans-serif; }' +
					'.k-grid { border-top-width: 0; }' +
					'.k-grid, .k-grid-content { height: auto !important; }' +
					'.k-grid-content { overflow: visible !important; }' +
					'div.k-grid table { table-layout: auto; width: 100% !important; }' +
					'.k-grid .k-grid-header th { border-top: 1px solid; }' +
					'.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
					'</style><style type="text/css" media="print"> @page { size: portrait; margin:1mm; }'+
						'.inv1 .main-color {' +

							'-webkit-print-color-adjust:exact; ' +
						'} ' +
						'.table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;' +
						'-webkit-print-color-adjust:exact; color:#fff!important;}' +
						'.table.table-borderless.table-condensed  tr th * { color: #fff!important; -webkit-print-color-adjust:exact;}' +
						'.inv1 .light-blue-td { ' +
							'background-color: #c6d9f1!important;' +
							'text-align: left;' +
							'padding-left: 5px;' +
							'-webkit-print-color-adjust:exact; ' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr td { ' +
							'background-color: #F2F2F2!important; -webkit-print-color-adjust:exact;' +
						'}'+
						'.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td { ' +
							' background-color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span2 *, .journal_block1>.span5 * {color: #fff!important;}' +
						'.journal_block1>.span2:first-child { ' +
							'background-color: #bbbbbb!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.journal_block1>.span5:last-child {' +
							'background-color: #496cad!important; color: #fff!important; -webkit-print-color-adjust:exact; ' +
						'}' +
						'.journal_block1>.span5 {' +
							'background-color: #5cc7dd!important; color: #fff!important; -webkit-print-color-adjust:exact;' +
						'}' +
						'.saleSummaryCustomer .table.table-borderless.table-condensed tfoot .bg-total td {' +
							'background-color: #1C2633!important;' +
							'color: #fff!important; ' +
							'-webkit-print-color-adjust:exact;' +
						'}' +
						'</style>' +
					'</head>' +
					'<body><div class="saleSummaryCustomer" style="padding: 0 10px;">';
			var htmlEnd =
					'</div></body>' +
					'</html>';

			printableContent = $('#invFormContent').html();
			doc.write(htmlStart + printableContent + htmlEnd);
			doc.close();
			setTimeout(function(){
				win.print();
				win.close();
			},2000);
		},
		ExportExcel         : function(){
			var workbook = new kendo.ooxml.Workbook({
			  sheets: [
				{
				  columns: [
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true },
					{ autoWidth: true }
				  ],
				  title: "General Ledger",
				  rows: this.exArray
				}
			  ]
			});
			//save the file as Excel file with extension xlsx
			kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "GeneralLedger.xlsx"});
		}
	});



	/* views and layout */
	banhji.view = {
		layout: new kendo.Layout('#layout', {
			model: banhji.Layout
		}),
		blank: new kendo.View('<div></div>'),
		index: new kendo.Layout("#index", {
			model: banhji.index
		}),
		menu: new kendo.Layout('#menu-tmpl', {
			model: banhji.userManagement
		}),
		searchAdvanced: new kendo.Layout("#searchAdvanced", {
			model: banhji.searchAdvanced
		}),
		//------------------------------------
		Index: new kendo.Layout("#Index", {model: banhji.Index}),

		// Function
		vendor: new kendo.Layout("#vendor", {model: banhji.vendor}),
		purchaseOrder: new kendo.Layout("#purchaseOrder", {model: banhji.purchaseOrder}),
		purchase: new kendo.Layout("#purchase", {model: banhji.purchase}),
		purchaseDashBoard: new kendo.Layout("#purchaseDashBoard", {model: banhji.purchaseDashBoard}),
		purchaseReturn: new kendo.Layout("#purchaseReturn", {model: banhji.purchaseReturn}),
		paymentRefund: new kendo.Layout("#paymentRefund", {model: banhji.paymentRefund}),
		vendorDeposit: new kendo.Layout("#vendorDeposit", {model: banhji.vendorDeposit}),
		cashPayment: new kendo.Layout("#cashPayment", {model: banhji.cashPayment}),

		// Report
		expensesSummarySupplier: new kendo.Layout("#expensesSummarySupplier", {model: banhji.expensesSummarySupplier}),
		expensesDetailSupplier: new kendo.Layout("#expensesDetailSupplier", {model: banhji.expensesDetailSupplier}),
		purchaseSummaryProductServices: new kendo.Layout("#purchaseSummaryProductServices", {model: banhji.purchaseSummaryProductServices}),
		purchaseDetailProductServices: new kendo.Layout("#purchaseDetailProductServices", {model: banhji.purchaseDetailProductServices}),
		suppliersBalanceSummary: new kendo.Layout("#suppliersBalanceSummary", {model: banhji.suppliersBalanceSummary}),
		suppliersBalanceDetail: new kendo.Layout("#suppliersBalanceDetail", {model: banhji.suppliersBalanceDetail}),
		payablesAgingSummary: new kendo.Layout("#payablesAgingSummary", {model: banhji.payablesAgingSummary}),
		payablesAgingDetail: new kendo.Layout("#payablesAgingDetail", {model: banhji.payablesAgingDetail}),
		listBillsPaid: new kendo.Layout("#listBillsPaid", {model: banhji.listBillsPaid}),
		billPaymentList: new kendo.Layout("#billPaymentList", {model: banhji.billPaymentList}),
		supplierTransaction: new kendo.Layout("#supplierTransaction", {model: banhji.supplierTransaction}),

		// Menu
		tapMenu: new kendo.View("#tapMenu", {model: banhji.tapMenu}),
		reports: new kendo.View("#reports", {model: banhji.reports}),
		checkOut: new kendo.View("#checkOut", {model: banhji.checkOut}),
		transactions: new kendo.View("#transactions", {model: banhji.transactions}),
		purchaseCenter: new kendo.View("#purchaseCenter", {model: banhji.purchaseCenter}),

	};
	/* views and layout */
	banhji.router = new kendo.Router({
		init: function() {
			var language = JSON.parse(localStorage.getItem('userData/lang'));
			switch (language) {
				case "KH":
					langVM.set('lang', km_KH);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
					break;
				case "EN":
					langVM.set('lang', en_US);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
					break;
				default:
					langVM.set('lang', en_US);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
			}
			localforage.getItem('user', function(err, data) {
				if (err) {

				} else {
					$('#current-section').html('|&nbsp;Company');
					$('#home-menu').addClass('active');
					banhji.view.layout.render("#wrapperApplication");
					banhji.index.set('companyName', data.institute.name);
					banhji.index.set('companyLogo', data.institute.logo);
					var blank = new kendo.View('#blank-tmpl');
					banhji.view.layout.showIn('#menu', banhji.view.menu);
					if (userPool.getCurrentUser() == null) {
						window.location.replace(baseUrl + "login");
					}
					banhji.aws.getImage();
				}
			});

		},
		routeMissing: function(e) {
			// banhji.view.layout.showIn("#layout-view", banhji.view.missing);
			console.log("no resource found.")
		}
	});
	/* Login page */
	banhji.router.route('/', function() {
		var blank = new kendo.View('#blank-tmpl');

		banhji.view.layout.showIn('#content', banhji.view.Index);
		banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
		banhji.view.Index.showIn('#indexContent', banhji.view.purchaseDashBoard);

		var vm = banhji.purchaseDashBoard;
		vm.pageLoad();
		vm.lineDS.bind("change", vm.itemLineDSChanges);
	});
	banhji.router.route('/check_out', function() {
		
		// banhji.view.layout.showIn('#content', banhji.view.Index);
		// banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
		banhji.view.Index.showIn('#indexContent', banhji.view.checkOut);

		//load MVVM
		banhji.checkOut.pageLoad();
	});
	banhji.router.route('/reports', function() {
		
		banhji.view.layout.showIn('#content', banhji.view.Index);
		banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
		banhji.view.Index.showIn('#indexContent', banhji.view.reports);

		var vm = banhji.reports;

		if(banhji.pageLoaded["reports"]==undefined){
			banhji.pageLoaded["reports"] = true;

			vm.sorterChanges();
		}

		vm.pageLoad();
	});
	banhji.router.route('/purchase_center', function() {
		
		banhji.view.layout.showIn('#content', banhji.view.Index);
		banhji.view.Index.showIn('#indexMenu', banhji.view.tapMenu);
		banhji.view.Index.showIn('#indexContent', banhji.view.purchaseCenter);

		if(banhji.pageLoaded["purchase_center"]==undefined){
			banhji.pageLoaded["purchase_center"] = true;
			
			banhji.source.supplierDS.filter({
				field: "parent_id",
				operator: "where_related_contact_type",
				value: 2
			});
		}

		//load MVVM
		banhji.purchaseCenter.pageLoad();
	});


	// VENDOR FUNCTIONS
	banhji.router.route("/vendor(/:id)(/:is_pattern)", function(id, is_pattern){
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
			var allowed = false;
			if(banhji.accessMod.data().length > 0) {
				for(var i = 0; i < banhji.accessMod.data().length; i++) {
					if("supplier" == banhji.accessMod.data()[i].name.toLowerCase()) {
						allowed = true;
						break;
					}
				}
			}
			if(allowed) {
				var vm = banhji.vendor;
				banhji.userManagement.addMultiTask("Supplier","vendor",vm);

				banhji.view.layout.showIn("#content", banhji.view.vendor);
				kendo.fx($("#slide-form")).slideIn("down").play();

				if(banhji.pageLoaded["vendor"]==undefined){
					banhji.pageLoaded["vendor"] = true;

					var validator = $("#example").kendoValidator({
						rules: {
							customRule1: function(input){
								if (input.is("[name=txtNumber]")) {
									return vm.get("notDuplicateNumber");
								}
								return true;
							}
						},
						messages: {
							customRule1: banhji.source.duplicateNumber
						}
					}).data("kendoValidator");

					$("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate()){
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate()){
							vm.set("saveClose", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});
				}

				vm.pageLoad(id, is_pattern);
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	banhji.router.route("/purchase_order(/:id)", function(id){
		// banhji.accessMod.query({
		//  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		// }).then(function(e){
		//  var allowed = false;
		//  if(banhji.accessMod.data().length > 0) {
		//      for(var i = 0; i < banhji.accessMod.data().length; i++) {
		//          if("supplier" == banhji.accessMod.data()[i].name.toLowerCase()) {
		//              allowed = true;
		//              break;
		//          }
		//      }
		//  }
		//  if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.purchaseOrder);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.purchaseOrder;
				banhji.userManagement.addMultiTask("Purchase Order","purchase_order",vm);

				if(banhji.pageLoaded["purchase_order"]==undefined){
					banhji.pageLoaded["purchase_order"] = true;

					vm.lineDS.bind("change", vm.lineDSChanges);

					var validator = $("#example").kendoValidator({
						rules: {
							customRule1: function(input) {
								if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
									vm.set("recurring_validate", false);
									return $.trim(input.val()) !== "";
								}
								return true;
							},
							customRule2: function(input){
								if (input.is("[name=txtNumber]")) {
									return vm.get("notDuplicateNumber");
								}
								return true;
							}
						},
						messages: {
							customRule1: banhji.source.requiredMessage,
							customRule2: banhji.source.duplicateNumber
						}
					}).data("kendoValidator");

					$("#saveDraft1").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveDraft", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#savePrint").click(function(e){
						e.preventDefault();
						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
							vm.set("saveRecurring", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});
				}

				vm.pageLoad(id);
		//  } else {
		//      window.location.replace(baseUrl + "admin");
		//  }
		// });
	});
	banhji.router.route("/vendor_deposit(/:id)", function(id){
		// banhji.accessMod.query({
		//  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		// }).then(function(e){
		//  var allowed = false;
		//  if(banhji.accessMod.data().length > 0) {
		//      for(var i = 0; i < banhji.accessMod.data().length; i++) {
		//          if("supplier" == banhji.accessMod.data()[i].name.toLowerCase()) {
		//              allowed = true;
		//              break;
		//          }
		//      }
		//  }
		//  if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.vendorDeposit);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.vendorDeposit;
				banhji.userManagement.addMultiTask("Supplier Deposit","vendor_deposit",vm);

				if(banhji.pageLoaded["vendor_deposit"]==undefined){
					banhji.pageLoaded["vendor_deposit"] = true;

					var validator = $("#example").kendoValidator({
						rules: {
							customRule1: function(input) {
								if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
									vm.set("recurring_validate", false);
									return $.trim(input.val()) !== "";
								}
								return true;
							},
							customRule2: function(input){
								if (input.is("[name=txtNumber]")) {
									return vm.get("notDuplicateNumber");
								}
								return true;
							}
						},
						messages: {
							customRule1: banhji.source.requiredMessage,
							customRule2: banhji.source.duplicateNumber
						}
					}).data("kendoValidator");

					$("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#savePrint").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate()){
							vm.set("saveRecurring", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});
				}

				vm.pageLoad(id);
		//  } else {
		//      window.location.replace(baseUrl + "admin");
		//  }
		// });
	});
	banhji.router.route("/purchase(/:id)", function(id){
		// banhji.accessMod.query({
		//  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		// }).then(function(e){
		//  var allowed = false;
		//  if(banhji.accessMod.data().length > 0) {
		//      for(var i = 0; i < banhji.accessMod.data().length; i++) {
		//          if("supplier" == banhji.accessMod.data()[i].name.toLowerCase()) {
		//              allowed = true;
		//              break;
		//          }
		//      }
		//  }
		//  if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.purchase);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.purchase;
				banhji.userManagement.addMultiTask("Purchase","purchase",vm);

				if(banhji.pageLoaded["purchase"]==undefined){
					banhji.pageLoaded["purchase"] = true;

					vm.lineDS.bind("change", vm.itemLineDSChanges);
					vm.accountLineDS.bind("change", vm.accountLineDSChanges);

					var validator = $("#example").kendoValidator({
						rules: {
							customRule1: function(input) {
								if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
									vm.set("recurring_validate", false);
									return $.trim(input.val()) !== "";
								}
								return true;
							},
							customRule2: function(input){
								if (input.is("[name=txtNumber]")) {
									return vm.get("notDuplicateNumber");
								}
								return true;
							}
						},
						messages: {
							customRule1: banhji.source.requiredMessage,
							customRule2: banhji.source.duplicateNumber
						}
					}).data("kendoValidator");

					$("#saveDraft1").click(function(e){
						e.preventDefault();

						if(validator.validate()){
							vm.set("saveDraft", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#savePrint").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
							vm.set("saveRecurring", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});
				}

				vm.pageLoad(id);
		//  } else {
		//      window.location.replace(baseUrl + "admin");
		//  }
		// });
	});    
	banhji.router.route("/credit_purchase(/:id)", function(id){
		// banhji.accessMod.query({
		//  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		// }).then(function(e){
		//  var allowed = false;
		//  if(banhji.accessMod.data().length > 0) {
		//      for(var i = 0; i < banhji.accessMod.data().length; i++) {
		//          if("supplier" == banhji.accessMod.data()[i].name.toLowerCase()) {
		//              allowed = true;
		//              break;
		//          }
		//      }
		//  }
		//  if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.purchase);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.purchase;
				banhji.userManagement.addMultiTask("Purchase","purchase",vm);

				if(banhji.pageLoaded["purchase"]==undefined){
					banhji.pageLoaded["purchase"] = true;

					vm.lineDS.bind("change", vm.itemLineDSChanges);
					vm.accountLineDS.bind("change", vm.accountLineDSChanges);

					var validator = $("#example").kendoValidator({
						rules: {
							customRule1: function(input) {
								if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
									vm.set("recurring_validate", false);
									return $.trim(input.val()) !== "";
								}
								return true;
							},
							customRule2: function(input){
								if (input.is("[name=txtNumber]")) {
									return vm.get("notDuplicateNumber");
								}
								return true;
							}
						},
						messages: {
							customRule1: banhji.source.requiredMessage,
							customRule2: banhji.source.duplicateNumber
						}
					}).data("kendoValidator");

					$("#saveDraft1").click(function(e){
						e.preventDefault();

						if(validator.validate()){
							vm.set("saveDraft", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#savePrint").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
							vm.set("saveRecurring", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});
				}

				vm.pageLoad(id);
		//  } else {
		//      window.location.replace(baseUrl + "admin");
		//  }
		// });
	});
	banhji.router.route("/cash_purchase(/:id)", function(id){
		// banhji.accessMod.query({
		//  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		// }).then(function(e){
		//  var allowed = false;
		//  if(banhji.accessMod.data().length > 0) {
		//      for(var i = 0; i < banhji.accessMod.data().length; i++) {
		//          if("supplier" == banhji.accessMod.data()[i].name.toLowerCase()) {
		//              allowed = true;
		//              break;
		//          }
		//      }
		//  }
		//  if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.purchase);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.purchase;
				banhji.userManagement.addMultiTask("Purchase","purchase",vm);

				if(banhji.pageLoaded["purchase"]==undefined){
					banhji.pageLoaded["purchase"] = true;

					vm.lineDS.bind("change", vm.itemLineDSChanges);
					vm.accountLineDS.bind("change", vm.accountLineDSChanges);

					var validator = $("#example").kendoValidator({
						rules: {
							customRule1: function(input) {
								if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
									vm.set("recurring_validate", false);
									return $.trim(input.val()) !== "";
								}
								return true;
							},
							customRule2: function(input){
								if (input.is("[name=txtNumber]")) {
									return vm.get("notDuplicateNumber");
								}
								return true;
							}
						},
						messages: {
							customRule1: banhji.source.requiredMessage,
							customRule2: banhji.source.duplicateNumber
						}
					}).data("kendoValidator");

					$("#saveDraft1").click(function(e){
						e.preventDefault();

						if(validator.validate()){
							vm.set("saveDraft", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#savePrint").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
							vm.set("saveRecurring", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});
				}

				vm.pageLoad(id);
		//  } else {
		//      window.location.replace(baseUrl + "admin");
		//  }
		// });
	});
	banhji.router.route("/purchase_return(/:id)", function(id){
		// banhji.accessMod.query({
		//  filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		// }).then(function(e){
		//  var allowed = false;
		//  if(banhji.accessMod.data().length > 0) {
		//      for(var i = 0; i < banhji.accessMod.data().length; i++) {
		//          if("supplier" == banhji.accessMod.data()[i].name.toLowerCase()) {
		//              allowed = true;
		//              break;
		//          }
		//      }
		//  }
		//  if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.purchaseReturn);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.purchaseReturn;
				banhji.userManagement.addMultiTask("Purchase Return","purchase_return",vm);

				if(banhji.pageLoaded["purchase_return"]==undefined){
					banhji.pageLoaded["purchase_return"] = true;

					var validator = $("#example").kendoValidator({
						rules: {
							customRule1: function(input){
								if (input.is("[name=txtNumber]")) {
									return vm.get("notDuplicateNumber");
								}
								return true;
							}
						},
						messages: {
							customRule1: banhji.source.duplicateNumber
						}
					}).data("kendoValidator");

					$("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});

					$("#savePrint").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
							vm.save();
						}else{
							$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
						}
					});
				}

				vm.pageLoad(id);
		//  } else {
		//      window.location.replace(baseUrl + "admin");
		//  }
		// });
	});
	banhji.router.route("/payment_refund(/:id)", function(id){
		banhji.view.layout.showIn("#content", banhji.view.paymentRefund);
		kendo.fx($("#slide-form")).slideIn("down").play();

		var vm = banhji.paymentRefund;
		banhji.userManagement.addMultiTask("Payment Refund","payment_refund",vm);

		if(banhji.pageLoaded["payment_refund"]==undefined){
			banhji.pageLoaded["payment_refund"] = true;

			var validator = $("#example").kendoValidator({
				rules: {
					customRule1: function(input){
						if (input.is("[name=txtNumber]")) {
							return vm.get("notDuplicateNumber");
						}
						return true;
					}
				},
				messages: {
					customRule1: banhji.source.duplicateNumber
				}
			}).data("kendoValidator");

			$("#saveNew").click(function(e){
				e.preventDefault();

				if(validator.validate() && vm.validating()){
					vm.save();
				}else{
					$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				}
			});

			$("#saveClose").click(function(e){
				e.preventDefault();

				if(validator.validate() && vm.validating()){
					vm.set("saveClose", true);
					vm.save();
				}else{
					$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				}
			});

			$("#savePrint").click(function(e){
				e.preventDefault();

				if(validator.validate() && vm.validating()){
					vm.set("savePrint", true);
					vm.save();
				}else{
					$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				}
			});
		}

		vm.pageLoad(id);
	});
	banhji.router.route("/cash_payment(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.cashPayment);
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.cashPayment;
			banhji.userManagement.addMultiTask("Cash Payment","cash_payment",vm);

			if(banhji.pageLoaded["cash_payment"]==undefined){
				banhji.pageLoaded["cash_payment"] = true;

				vm.dataSource.bind("change", vm.dataSourceChanges);

				var validator = $("#example").kendoValidator().data("kendoValidator");
				$("#saveNew").click(function(e){
					e.preventDefault();

					if(validator.validate()){
						vm.save();
					}else{
						$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
					}
				});

				$("#saveClose").click(function(e){
					e.preventDefault();

					if(validator.validate()){
						vm.set("saveClose", true);
						vm.save();
					}else{
						$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
					}
				});

				$("#savePrint").click(function(e){
					e.preventDefault();

					if(validator.validate()){
						vm.set("savePrint", true);
						vm.save();
					}else{
						$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
					}
				});
			}

			vm.pageLoad(id);
		}
	});

	// Report
	banhji.router.route("/expenses_purchase_summary_supplier", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.expensesSummarySupplier);

			var vm = banhji.expensesSummarySupplier;
			banhji.userManagement.addMultiTask("Expense/ Purchase Summary by Supplier","expenses_purchase_summary_supplier",null);

			if(banhji.pageLoaded["expenses_purchase_summary_supplier"]==undefined){
				banhji.pageLoaded["expenses_purchase_summary_supplier"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/expenses_purchase_detail_supplier", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.expensesDetailSupplier);

			var vm = banhji.expensesDetailSupplier;
			banhji.userManagement.addMultiTask("Expense/ Purchase Detail by Supplier","expenses_purchase_detail_supplier",null);

			if(banhji.pageLoaded["expenses_purchase_detail_supplier"]==undefined){
				banhji.pageLoaded["expenses_purchase_detail_supplier"] = true;

				vm.sorterChanges();
			}
			banhji.expensesDetailSupplier.dataSource.bind('requestEnd', function(e){
				if(e.response) {
					banhji.expensesDetailSupplier.set('count', e.response.count);
					kendo.culture(banhji.locale);
					banhji.expensesDetailSupplier.set('total', kendo.toString(e.response.total, 'c2'));
				}
			});
			vm.pageLoad();
		}
	});
	banhji.router.route("/purchase_summary_product_services", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.purchaseSummaryProductServices);

			var vm = banhji.purchaseSummaryProductServices;
			banhji.userManagement.addMultiTask("Purchase Summary Product/Service","purchase_summary_product_services", null);

			if(banhji.pageLoaded["purchase_summary_product_services"]==undefined){
				banhji.pageLoaded["purchase_summary_product_services"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/purchase_detail_product_services", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.purchaseDetailProductServices);

			var vm = banhji.purchaseDetailProductServices;
			banhji.userManagement.addMultiTask("Purchase Detail Product/Service","purchase_detail_product_services", null);

			if(banhji.pageLoaded["purchase_detail_product_services"]==undefined){
				banhji.pageLoaded["purchase_detail_product_services"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/suppliers_balance_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.suppliersBalanceSummary);

			var vm = banhji.suppliersBalanceSummary;
			banhji.userManagement.addMultiTask("Supplier Balance Summary","suppliers_balance_summary", null);

			if(banhji.pageLoaded["suppliers_balance_summary"]==undefined){
				banhji.pageLoaded["suppliers_balance_summary"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/suppliers_balance_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.suppliersBalanceDetail;
			banhji.userManagement.addMultiTask("Supplier Balance Detail","suppliers_balance_detail", null);
			banhji.view.layout.showIn("#content", banhji.view.suppliersBalanceDetail);
			if(banhji.pageLoaded["suppliers_balance_detail"]==undefined){
				banhji.pageLoaded["suppliers_balance_detail"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/payables_aging_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.payablesAgingSummary);

			var vm = banhji.payablesAgingSummary;
			banhji.userManagement.addMultiTask("Payables Aging Summary ","payables_aging_summary", null);

			if(banhji.pageLoaded["payables_aging_summary"]==undefined){
				banhji.pageLoaded["payables_aging_summary"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/payables_aging_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.payablesAgingDetail);

			var vm = banhji.payablesAgingDetail;
			banhji.userManagement.addMultiTask("Payables Aging Detail ","payables_aging_detail", null);

			if(banhji.pageLoaded["payables_aging_detail"]==undefined){
				banhji.pageLoaded["payables_aging_detail"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/list_bills_paid", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.listBillsPaid);

			var vm = banhji.listBillsPaid;
			banhji.userManagement.addMultiTask("List Bills Paid ","list_bills_paid", null);

			if(banhji.pageLoaded["collect_invoice"]==undefined){
				banhji.pageLoaded["collect_invoice"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/bill_payment_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.billPaymentList;
			banhji.userManagement.addMultiTask("List of Payment","bill_payment_list", null);
			banhji.view.layout.showIn("#content", banhji.view.billPaymentList);

			if(banhji.pageLoaded["bill_payment_list"]==undefined){
				banhji.pageLoaded["bill_payment_list"] = true;

				vm.sorterChanges();
			}
			vm.pageLoad();
		}
	});
	

	//Router Start 
	$(function() {
		banhji.router.start();
		banhji.source.pageLoad();
	});    
</script>
const templatePhanTrang = `<nav aria-label="Page navigation"> 
<ul class="pagination justify-content-center">
    <li class="page-item disabled">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    <li ng-repeat="item in NumToArray(totalPage)" ng-class="item==pagesIndex?'active':''" class="page-item ">
        <a ng-click="onClick(item,10)" class="page-link" href="#">
        {{item}}
        </a>
    </li> 
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
</ul>
</nav>`;
export default templatePhanTrang;

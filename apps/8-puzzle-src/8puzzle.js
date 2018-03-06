var traverseVar;
var solArr;
var startBoard;
$(document).ready(function(){
	//initializtion
		start = new Board([1,2,3,8,0,4,7,6,5],0,1000,-1,null);
		start.findSpace();
		goal = [1,2,3,8,0,4,7,6,5];
		displayStartBoard('.gameboard-body.start');
		displayGoalBoard('.gameboard-body.goal');
	});
//######################################################//
//######################################################//
//######### FOR DISPLAYING ON WEBSITE ##################//
//######################################################//
//######################################################//
	function upBtn()
	{
		var b = start.moveUp();
		start = b;
		displayStartBoard();
	}
	function downBtn()
	{
		var b = start.moveDown();
		start = b;
		displayStartBoard();
	}
	function leftBtn()
	{
		var b = start.moveLeft();
		start = b;
		displayStartBoard();		
	}
	function rightBtn()
	{
		var b = start.moveRight();
		start = b;
		displayStartBoard();	
	}

	function shuffleBtn()
	{
		shuffleBoard();
		displayStartBoard();
	}

	function traverseBtn()
	{
		if(solArr[1]!=null)
		{
			fuck = solArr[1].length-1;		
			clearInterval(traverseVar);
			$('.solution').text(arrToString(startBoard));
			traverseVar = setInterval(traverse, 1000);
		}
		else
		{
			console.log("No solution path!");
		}
	}

	function stopTraverseBtn()
	{
		clearInterval(traverseVar);
	}

	function findGoalBtn()
	{
		$element = $('.sol-path');
		$element.text('');
		doThings();
		if(solArr[0]==true)
    	{
    		solPath = solArr[1];
    		$('.num-path-holder').text("The Path to the Goal was found in " + solPath.length + " moves.");
    		$element.append("<div class='card gameboard'><div class='card-body'><h6 class='card-title'>0:</h6><p class='card-text gameboard-body'>" + arrToString(startBoard) + "</p></div></div>");
    		for(var i=solPath.length-1;i>=0;i--)
    		{
    			$element.append("<div class='card gameboard'><div class='card-body'><h6 class='card-title'>" + (solPath.length-i) + ":</h6><p class='card-text gameboard-body'>" + arrToString(solPath[i]) + "</p></div></div>");
    		}
    	}
   		else
   		{
   			$element.append("Goal could not be reached...");
   		}
	}

	function traverse()
	{
		if(fuck>=0)
		{
			//solPath = solArr[1];
			$('.solution').text(arrToString(solPath[fuck]));
			fuck--;
		}
		else if(fuck==-1)
		{
			console.log("End of traversal");
		}			
	}

	function displayStartBoard()
	{
		$('.gameboard-body.start').text(start.boardToString());
	}

	function displayGoalBoard()
	{
		$('.gameboard-body.goal').text(start.boardToString());
	}

	function clearSolPath()
	{
		$('.sol-path').text('');
	}
//######################################################//
//######################################################//
//############### START ALGORITHM ######################//
//######################################################//
//######################################################//

    function doThings(){
    	startBoard = start.board;
    	var search = new Search(goal,start,0,50);
    	solArr = search.findGoal();

    	//displaySolutionPath(solArr);
    }

	function shuffleBoard()
	{
		var times = 1000;
		var b = start;
		for(var i=0;i<times;i++)
		{
			var children=b.findChildren();
			var rand = Math.floor(Math.random()*Math.floor(children.length));
			b=children[rand];
		}
		start = b;
	}

    function arrToString(arr)
   	{
    	var s = "";
   		for(var i=0;i<arr.length;i++)
   	 	{
   			s+= arr[i] + " ";
  		}
 		return s;
    }
 

//###################################################################//
//###################################################################//
//###################### Board Class ################################//
//###################################################################//
//###################################################################//

function Board (board,gVal,hVal,space,parent)
{
	this.board = board;
	this.gVal = gVal;
	this.hVal = hVal;
	this.space = space;
	this.parent = parent;

	this.findSpace = function()
	{
		for(var x=0;x<3;x++)
		{
			for(var y=0;y<3;y++)
			{
				if(board[(x*3)+y]==0)
				{
					var index = (x*3)+y;
					this.space=index;
				}
			}
		}
		return -1;
	};

	//set functions
	this.setSpace = function(num)
	{
		this.space = num;
	}

	this.setGVal = function(num)
	{
		this.gVal = num;
	}

	this.setHVal = function(num)
	{
		this.hVal = num;
	}
	this.setParent = function(parent)
	{
		this.parent = parent;
	}
	//==============FIND CHILDREN====================//
	this.findChildren = function()
	{
		var children = [];
		//can probably place an if statement at beginning to weed out edge cases sooner
		if(this.space==0)
		{
			children.push(this.moveDown());
			children.push(this.moveRight());
		}
		else if(this.space==1)
		{
			children.push(this.moveLeft());
			children.push(this.moveDown());
			children.push(this.moveRight());
		}
		else if(this.space==2)
		{
			children.push(this.moveLeft());
			children.push(this.moveDown());	
		}
		else if(this.space==3)
		{
			children.push(this.moveUp());
			children.push(this.moveRight());
			children.push(this.moveDown());
		}
		else if(this.space==4)
		{
			children.push(this.moveUp());
			children.push(this.moveRight());
			children.push(this.moveDown());
			children.push(this.moveLeft());
		}
		else if(this.space==5)
		{
			children.push(this.moveUp());
			children.push(this.moveLeft());
			children.push(this.moveDown());
		}
		else if(this.space==6)
		{
			children.push(this.moveUp());
			children.push(this.moveRight());
		}
		else if(this.space==7)
		{
			children.push(this.moveLeft());
			children.push(this.moveUp());
			children.push(this.moveRight());
		}
		else if(this.space==8)
		{
			children.push(this.moveUp());
			children.push(this.moveLeft());
		}
		else
		{
			console.error("findChildren() --> Hole out of bounds! Cannot find children!");
		}
		return children;
	}
	//===========END FIND CHILDREN=================//

	//==========MOVEMENT FUNCTIONS=================//
	this.moveUp = function()
	{
		var arr = this.getCopy();
		if(this.space<3)
		{
			console.error("moveUp() --> Out of Bounds!!!");
			return start;
		}
		else
		{
			var temp = arr[this.space-3];
			arr[this.space-3] = 0;
			arr[this.space] = temp;
			return new Board(arr,0,1000, this.space-3, null);
		}
	}

	this.moveDown = function()
	{
		var arr = this.getCopy();
		if(this.space>5){
			console.error("moveDown() --> Out of Bounds!!!");
			return start;
		}
		else
		{
			var temp = arr[this.space+3];
			arr[this.space+3] = 0;
			arr[this.space] = temp;
			return new Board(arr,0,1000, this.space+3, null);
		}

	}

	this.moveRight = function()
	{
		var arr = this.getCopy();
		if(this.space==2||this.space==5||space==8){
			console.error("moveRight() --> Out of Bounds!!!");
			return start;
		}
		else
		{
			var temp = arr[this.space+1];
			arr[this.space+1] = 0;
			arr[this.space] = temp;
			return new Board(arr,0,1000, this.space+1, null);
		}

	}

	this.moveLeft = function()
	{
		var arr = this.getCopy();
		if(this.space==0||this.space==3||space==6)
		{
			console.error("moveLeft() --> Out of Bounds!!!");
			return start;
		}
		else
		{
			var temp = arr[this.space-1];
			arr[this.space-1] = 0;
			arr[this.space] = temp;
			return new Board(arr,0,1000, this.space-1, null);
		}

	}
	//==========END MOVEMENT FUNCTIONS==============//
	//utility functions
	this.boardToString = function()
	{
		var s = "";
		for(var x=0;x<3;x++)
		{
			for(var y=0;y<3;y++)
			{
				s+= board[(x*3)+y] + " ";
			}
		}
		return s;
	}
	this.valuesToString = function()
	{
		return "gVal = " + this.gVal + "; hVal = " + this.hVal + "; space = " + this.space+";";
	}

	/*in:
		 - b = Board object
	*/
	this.getCopy = function()
	{
		//var og = b.board;
		var copyOf = [];
		for(var x=0;x<3;x++)
		{
			for(var y=0;y<3;y++)
			{
				copyOf[(x*3)+y]=this.board[(x*3)+y];
			}
		}
		return copyOf;
	}

	this.equals = function(a)
	{
		if(a==this){
			return true;
		}
		if(!(a instanceof Board)){
			return false;
		}
		if(!(a.boardToString()==this.boardToString())){
			return false;
		}
		return true;
	}

}

//###################################################################//
//###################################################################//
//######################## Search Class #############################//
//###################################################################//
//###################################################################//
function Search(goal,board,num,limit)
{
	this.goal = goal;
	this.board = board;
	this.num = num;
	this.limit = limit;

	this.findGoal = function()
	{
		var queue = new PriorityQueue();
		var closed = new Set();
		var open = new Set();
		var isFound=false;
		var firstHVal = this.findHVal(board.board);
		board.setHVal(firstHVal);

		queue.offer(this.board);
		while(isFound==false&&queue.numElements>0)
		{
			var current = queue.poll();
			var children = current.findChildren();

			// console.log("Current = " + current.boardToString());
			// console.log("Num children: " + children.length);
			for(var i=0;i<children.length;i++)
			{
				if(current.hVal==0)
				{
					// console.log("Solution found!");
					// console.log("Printing Solution Path!");
					var solPath = this.getSolutionPath(current);
					return [true,solPath];
				}
				var hVal = this.findHVal(children[i].board);
				var gVal = children[i].gVal;
				children[i].setHVal(hVal);
				children[i].setGVal(gVal+1);
				children[i].setParent(current);

				var childString = children[i].boardToString();

				// console.log("\tChild num["+i+"]:" + children[i].boardToString());
				// console.log("\t\t"+children[i].valuesToString());

				if(!open.has(childString)&&!closed.has(childString)&&!current.equals(children[i]))
				{
					// console.log("\t\tAdding child to PriorityQueue!");
					open.add(childString);
					queue.offer(children[i]);
				}
			}
			closed.add[current.boardToString()];
		}
		return isFound;
	}

	/*
	*	in:
	*		- int [] currentState -> represents the gameboard
	*	out:
	*		- int total -> heuristic Val of the currentState param, calc. using manhattan distance
	*/
	this.findHVal = function(currentState)
	{
		//do things
		//var arr = currentState;
		var total = 0;
		for(var x=0;x<3;x++)
		{
			for(var y=0;y<3;y++)
			{
				var foo = currentState[(x*3)+y];
				if(foo==0)
					continue;

				var x_y = this.findNumAxes(foo,this.goal)

				if(x_y[0]!=-1&&x_y[1]!=-1)
				{
					var temp = Math.abs(x_y[0]-x) + Math.abs(x_y[1]-y);
					total+=temp;
				}
			}
		}
		return total;
	}

	/*
	*	Description:
	*		-	This method takes a number and finds its location in the int [] goal; 
				it then returns the location as a int[] arr that holds the x and y coordinates of its location.
				I know it sounds pretty convuluted but I do it this way for.... reasons.....
	*	in:
	*		- int num -> represents the number we are comparing against the goal
	*		- state = int[] that represents the gameboard  <------(I dont think this is needed, will remove later)
	*	out:
	*		- x_y = the x and y coordinates of the number we were searching for
	*/
	this.findNumAxes = function(num, state)
	{
		var x_y = [-1,-1];
		for(var x=0;x<3;x++)
		{
			for(var y=0;y<3;y++)
			{
				var compare = this.goal[(x*3)+y];
				if(num==compare)
				{
					x_y[0]=x;
					x_y[1]=y;
					break;
				}
			}
		}
		return x_y;
	}

	this.getSolutionPath = function(b)
	{
		var path = [];
		var current = b;
		path.push(b.getCopy());
		while(current.parent!=null)
		{
			path.push(current.getCopy());
			current=current.parent;
		}
		return path;
	}
}

//###################################################################//
//###################################################################//
//##################### Priority Queue Class ########################//
//###################################################################//
//###################################################################//
function PriorityQueue()
{
	this.values = [];
	this.numElements = 0;
	this.offer = function(element)
	{
		if(this.numElements==0)
		{
			this.values.push(element);
			this.numElements++;
		}
		else if(this.compare(element,this.values[this.numElements-1])==1)
		{
			this.values.push(element);
			this.numElements++;
		}
		else
		{
			var stop = false;
			var index = 0;
			while(!stop&&index<this.values.length)
			{
				var result = this.compare(element,this.values[index]);
				if(result == 0 || result == -1)
				{
					this.values.splice(index,0,element);
					this.numElements++;
					stop=true;
				}
				index++;
			}
		}
	}

	this.poll = function()
	{
		if(this.values.length>0)
		{
			this.numElements--;
			return this.values.shift();
		}
		else{
			console.error("PriorityQueue.poll() -> No elements in Queue!!");
		}
	}

	this.peek = function()
	{
		if(this.values.length>0){
			return this.values[0];
		}
		else{
			console.error("PriorityQueue.peek() -> No elements in Queue!!");
		}
	}

	this.compare = function(a,b)
	{
		if((a.hVal+a.gVal)<(b.hVal+b.gVal))
		{
			return -1;
		}
		if((a.hVal+a.gVal)>(b.hVal+b.gVal))
		{
			return 1
		}
		return 0;
	}
}





